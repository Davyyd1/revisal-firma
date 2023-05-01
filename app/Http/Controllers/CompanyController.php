<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use Validator;

class CompanyController extends Controller
{
    public function show_company(){
        $companies = Company::orderBy('created_at', 'ASC')->paginate(5);
        return view('tCompanie.show', compact('companies'));
    }

    public function show_form_company()
    {
        return view('tCompanie.add-company');
    }

    public function add_company(Request $request)
    {
        $check_name=Company::where('nume',$request->nume_companie)->first();
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

            $company=new Company();
            $company->nume = $request->nume_companie;
            $company->save();
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Compania a fost adaugata cu succes!</div>' 
            ]);
        }
    }

    private function validate_input(){
        return
        [
            'nume_companie' => 'required'
        ];
    }
}
