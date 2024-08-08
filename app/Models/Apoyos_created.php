<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoyos_created extends Model
{
    use HasFactory;
// esta información sirve crear un apoyo 
    protected $fillable = [
        'appoiment_name',
        'appoiment_date_start',
        'appoiment_date_end',
        'appoiment_status'

    ];
    public function appoiment()
    {
        //a cada apoyo se le agrega un id para poder representar
        return $this->belongsTo(Apoyos_created::class, 'id');
    }

}
