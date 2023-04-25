<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Employees extends Model
{
    protected $table = "Employees";
    protected $fillable = ['nume', 'prenume','functie','serie_ci','numar_ci','cnp','adresa','slug'];
    use HasFactory;
}
