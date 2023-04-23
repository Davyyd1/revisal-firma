<?php

namespace App\Http\Controllers;

use App\Employees;
use Illuminate\Http\Request;

class SearchController extends Controller
{
    public function search_employee(Request $request){
        $search = Employees::where('nume','LIKE', '%'.$request->nume.'%')
        ->where('prenume','LIKE', '%'.$request->prenume.'%')
        ->where('prenume','LIKE', '%'.$request->numar_marca.'%')
        ->paginate(10);
        return view('tAngajati.cauta-angajat',compact('search'));
    }
}
