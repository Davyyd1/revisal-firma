<?php

use App\Company;
use App\Employees;

if(!function_exists('get_employee_details_co')){
    function get_employee_details_co($employee_id){
        $employee = Employees::where('employees.id', $employee_id)
        ->leftjoin('employees_co', 'employees.id','employees_co.employee_id')
        ->get();

        if($employee)
        return $employee;
    }   
}

if(!function_exists('autocomplete')){
    function autocomplete($employee){
        if($employee){
            return $employee;
        } elseif(!$employee) {
            return "..............................";
        }
    }   
}


if(!function_exists('get_company_name')){
    function get_company_name($employee_id){
        $employee = Employees::where('employees.id', $employee_id)
        ->leftjoin('company', 'employees.company_id','company.id')
        ->first();

        // dd($employee);
        if($employee)
        return $employee->nume;
    }   
}

if(!function_exists('get_companies')){
    function get_company(){
        $company = Company::all();

        // dd($employee);
        if($company)
        return $company;
    }   
}

