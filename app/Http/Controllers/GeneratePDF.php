<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class GeneratePDF extends Controller
{
    public function show_pdf(Request $request){
        $angajat=Employees::where('slug',$request->slug)->first();
        return view('tAngajati.genereaza-pdf', compact('angajat'));
    }
}
