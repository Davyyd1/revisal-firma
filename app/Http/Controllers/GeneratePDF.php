<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class GeneratePDF extends Controller
{
    public function show_pdf(Request $request){
        return view('tAngajati.genereaza-pdf');
    }
}
