<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoyos_created extends Model
{
    use HasFactory;
// esta información sirve crear un apoyo 
    protected $fillable = [
        'apoyo_id',
        'tipo_apoyo_id',
        'appoiment_date_start',
        'appoiment_date_end',
        'status'

    ];
    // Define la relación con tipos_apoyos
    public function tipoApoyo()
    {
        return $this->belongsTo(tipos_apoyos::class, 'tipo_apoyo_id');
    }

}
