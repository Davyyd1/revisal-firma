<?php

namespace App\Http\Controllers;

use App\Company;
use Illuminate\Http\Request;
use PDO;
use Validator;
use Str;

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

    public function edit_company($id, Request $request)
    {
        $company = Company::where('slug', $request->slug)->first();
        // dd($company);
        return view('tCompanie.edit-company', compact('company'));
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
            $company->slug = Str::slug($request->nume_companie);
            $company->save();
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Compania a fost adaugata cu succes!</div>' 
            ]);
        }
    }

    public function update_company(Request $request){
        $company=Company::where('slug',$request->slug)->first();
        $validator=Validator::make($request->input(),$this->validate_input());
        if ($validator->fails()) {
            return response([
                'status'=>0,
                'mesaj'=>'<div class="alert alert-danger" role="alert">
                '.$validator->errors()->first().'
              </div>' 
            ]);
        } elseif(!$validator->fails()){
        $company->update([
            'nume' => $request->nume_companie,
            'slug' => Str::slug($request->nume_companie)
        ]);
        return response([
            'status'=>1,
            'mesaj'=>'<div class="alert alert-success" role="alert">
            Compania a fost actualizata cu succes!</div>' 
        ]);
        }
    }

    public function delete_company(Request $request) 
    {
        $company = Company::where('id', $request->id)->first();
        if($company){
            $company->delete();
            if(true){
            return response([
                'status'=>1,
                'mesaj'=>'<div class="alert alert-success" role="alert">
                Compania a fost stearsa cu succes!</div>' 
            ]);
            }
        }
    }

    private function validate_input(){
        return
        [
            'nume_companie' => 'required'
        ];
    }


    
}
