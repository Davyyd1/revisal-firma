<?php

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