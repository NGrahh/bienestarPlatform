<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class tipos_apoyos extends Model
{
    use HasFactory;
    protected $table = 'tipos_apoyos'; // Nombre de la tabla
    protected $fillable = ['name'];  // Columnas que se pueden llenar masivamente
}
