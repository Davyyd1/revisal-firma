<?php

namespace App\Http\Controllers;

use App\Employees;
use App\EmployeesCO;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;
use Response;

class GeneratePDF extends Controller
{
    public function show(Request $request){
        $angajat=Employees::where('slug',$request->slug)->first();
        
        return view('tAngajati.genereaza-pdf', compact('angajat'));
    }

    public function save_co(Request $request){
        $angajat=Employees::where('slug',$request->slug)->first();
        $dateCO = new EmployeesCO();
        $dateCO->employee_id = $angajat->id;
        $dateCO->data_cerere = $request->data_cerere;
        $dateCO->dataco_inceput = $request->dataco_inceput;
        $dateCO->dataco_sfarsit = $request->dataco_sfarsit;
        $dateCO->save();
        if($dateCO) {
        return response([
            'status'=>1,
            'mesaj'=>'<div class="alert alert-success" role="alert">
            Cererea a fost inregistrata cu succes!</div>' 
        ]);
        } return response([
            'status'=>0,
            'mesaj'=>'<div class="alert alert-danger" role="alert">
            '.$validator->errors()->first().'
          </div>' 
        ]);
    }

    public function generate_pdf($employee){
        $employee_co=EmployeesCO::where('id',$employee->employee_id);
        $data=[
            'employee' => $employee,
            'employee_co' => $employee_co
        ];
            $pdf = PDF::loadView('pdf.document', $data);
            $output = $pdf->output();
            //file_put_contents("file.pdf", $output);       
            // return Response::make($output, 200, [
            //     'Content-Type' => 'application/pdf',
            //     'Content-Disposition' => 'inline; filename="pdf.document"'
            // ]);
    }
}
