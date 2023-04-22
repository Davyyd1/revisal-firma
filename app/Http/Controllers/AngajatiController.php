<?php

namespace App\Http\Controllers;

use App\Employees;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;

class AngajatiController extends Controller
{
    public function show() {
        $angajati = Employees::orderBy('nume','ASC')->paginate(10);
        return view('tAngajati.angajati',compact('angajati'));
    }

    public function show_form(){
        return view('tAngajati.adauga-angajati');
    }

    public function add_employee(Request $request){
        $check_name=Employees::where('nume',$request->nume)->first();
        if(!$check_name)
        {   
            $validator=Validator::make($request->input(),$this->validate_input());
            if ($validator->fails()) {
                return response([
                    'status'=>0,
                    'mesaj'=>'<div class="alert alert-danger" role="alert">
                    '.$validator->errors()->first().'
                  </div>' 
                ]);
             }

            $employee=new Employees();
            $employee->numar_marca = $request->numar_marca;
            $employee->nume = $request->nume;
            $employee->prenume=$request->prenume;
            $employee->functie = $request->functie;
            $employee->serie_ci = $request->serie_ci;
            $employee->numar_ci = $request->numar_ci;
            $employee->cnp = $request->cnp;
            $employee->adresa = $request->adresa;
            $employee->save();
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Angajatul a fost adaugat cu succes!</div>' 
            ]);
        }
    }
        
    
    private function validate_input()
    {
        return [
            'numar_marca'=>"required",
            'nume'=>'required',
            'prenume'=>'required',
            'functie' => 'required',
            'serie_ci' => 'required',
            'numar_ci'=>'required',
            'cnp'=>'required',
            'adresa'=>'required'
        ];
    }
}