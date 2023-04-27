<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class AddCompanyController extends Controller
{
    public function show_form_company()
    {
        return view('tCompanie.add-company');
    }

    public function add_company()
    {
        
    }
}
