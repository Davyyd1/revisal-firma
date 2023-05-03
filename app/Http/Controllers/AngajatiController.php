<?php

namespace App\Http\Controllers;

use App\Company;
use App\Employees;
// use Dotenv\Validator;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Str;
use Route;

class AngajatiController extends Controller
{
    public function show() {
        $angajati = Employees::orderBy('nume','ASC')->paginate(10);
        return view('tAngajati.angajati',compact('angajati'));
    }

    public function show_form(){
        $companies = Company::orderBy('created_at', 'ASC')->get();
        return view('tAngajati.adauga-angajati', compact('companies'));
    }

    public function add_employee(Request $request){
        $check_name=Employees::where('numar_marca',$request->numar_marca)->first();
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
            $employee->company_id = $request->company_id;
            $employee->este_tesa = $request->este_tesa;
            $employee->are_drepturi = $request->are_drepturi;
            $employee->numar_marca = $request->numar_marca;
            $employee->nume = $request->nume;
            $employee->prenume=$request->prenume;
            $employee->functie = $request->functie;
            $employee->serie_ci = $request->serie_ci;
            $employee->numar_ci = $request->numar_ci;
            $employee->cnp = $request->cnp;
            $employee->adresa = $request->adresa;
            $employee->slug = Str::slug($request->nume.'-'.$request->prenume);
            $employee->save();
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Angajatul a fost adaugat cu succes!</div>' 
            ]);
        }
    }
        
    public function delete_employee(Request $request){
        $employee = Employees::where('id', $request->id)->where('numar_marca', $request->marca)->first();
        if($employee){
            $employee->delete();
            if(true){
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Angajatul a fost sters cu succes!</div>' 
            ]);
            }
        }
    }
    
    public function see_employee(Request $request){
        $angajat=Employees::where('slug',$request->slug)->first();
        return view('tAngajati.vezi-angajat', compact('angajat'));
    }

    public function update_employee(Request $request){
        $angajat=Employees::where('slug',$request->slug)
        ->first();
        
        $validator=Validator::make($request->input(),$this->validate_input());
        // dd(Str::slug($request->nume.'-'.$request->prenume));
            if ($validator->fails()) {
                return response([
                    'status'=>0,
                    'mesaj'=>'<div class="alert alert-danger" role="alert">
                    '.$validator->errors()->first().'
                  </div>' 
                ]);
            } elseif(!$validator->fails()){
            $angajat->update([
                'company_id' => $request->company_id,
                'este_tesa' => $request->este_tesa,
                'are_drepturi' => $request->are_drepturi,
                'nume' => $request->nume,
                'prenume' => $request->prenume,
                'functie' => $request->functie,
                'serie_ci' => $request->serie_ci,
                'numar_ci' => $request->numar_ci,
                'cnp' => $request->cnp,
                'adresa' => $request->adresa,
                'slug' => Str::slug($request->nume.'-'.$request->prenume)
            ]);
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Angajatul a fost actualizat cu succes!</div>' 
            ]);
            }
    }

    private function validate_input()
    {
        return [
            // 'numar_marca'=>"required",
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
