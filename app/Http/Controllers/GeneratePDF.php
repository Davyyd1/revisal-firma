<?php

namespace App\Http\Controllers;

use App\Employees;
use App\EmployeesCO;
use Illuminate\Http\Request;
use Dompdf\Dompdf;
use PDF;
use Response;
use DB;

class GeneratePDF extends Controller
{
    public function show(Request $request){
        $angajat=Employees::where('slug',$request->slug)->first();
        $angajat_tesa = Employees::where('este_tesa',1)->where('are_drepturi',1)->get();
        $angajat_tesa_preluareatrb = Employees::where('este_tesa', 1)->get();
        
        return view('tAngajati.genereaza-pdf', compact('angajat','angajat_tesa','angajat_tesa_preluareatrb'));
    }

    public function save_co(Request $request){
        $angajat=Employees::where('slug',$request->slug)->first();
        $dateCO = new EmployeesCO();
        $dateCO->employee_id = $angajat->id;
        $dateCO->employee_responsabil_id = $request->responsabil_ierarhic;
        $dateCO->employee_preluareatrb_id = $request->preluare_atributii;
        $dateCO->companie = $request->companie;
        $dateCO->nr_zile = $request->nr_zile;
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

    public function generate_pdf(){
        $employee_co=EmployeesCO::leftjoin('employees','employees_co.employee_id','employees.id')
        ->select('companie as companie','nr_zile as nr_zile','data_cerere as data_cerere', 'dataco_inceput as data_inceput', 'dataco_sfarsit as data_sfarsit', "nume as nume", "prenume as prenume", "functie as functie", "serie_ci as serie_ci", "numar_ci as numar_ci", "cnp as cnp", "adresa as adresa")
        ->orderBy('employees_co.id','DESC')
        ->first();

        $employee_co_responsabil = EmployeesCO::leftjoin('employees','employees_co.employee_responsabil_id','employees.id')
        ->select('nume as nume_responsabil','prenume as prenume_responsabil')
        ->orderBy('employees_co.id','DESC')
        ->first();

        $employee_preluareatrb = EmployeesCO::leftjoin('employees','employees_co.employee_preluareatrb_id','employees.id')
        ->select('nume as nume_persoana_preluare_atributii','prenume as prenume_persoana_preluare_atributii')
        ->orderBy('employees_co.id','DESC')
        ->first();
        
        $data=[
            'employee_co' => $employee_co,
            'employee_co_responsabil' => $employee_co_responsabil,
            'employee_preluareatrb' => $employee_preluareatrb
        ];
            $pdf = PDF::loadView('pdf.document', $data);
            $output = $pdf->output();
            file_put_contents("pdf.document", $output);       
            return Response::make($output, 200, [
                'Content-Type' => 'application/pdf',
                'Content-Disposition' => 'inline; filename="pdf.document"'
            ]);
    }
}
