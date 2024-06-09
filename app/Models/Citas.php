<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Citas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'name',
        'lastname',
        'dimensions_id',
        'email',
        'mobilenumber',
        'hour',
        'subjectCita',
    ];

}
