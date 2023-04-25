<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class EmployeesCO extends Model
{
    protected $table = "employees_co";
    protected $fillable = ['companie','nr_zile','employee_id','data_cerere','dataco_inceput','dataco_sfarsit'];
    use HasFactory;
}
