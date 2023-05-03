<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "Company";
    protected $fillable = ['nume','slug'];
    use HasFactory;
}
