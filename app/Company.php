<?php

namespace App;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $table = "Company";
    protected $fillable = ['nume','ro','j','slug'];
    use HasFactory;
}
