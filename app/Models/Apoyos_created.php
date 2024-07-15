<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoyos_created extends Model
{
    use HasFactory;

    protected $fillable = [
        'appoiment_name',
        'appoiment_date_start',
        'appoiment_date_end',
        'appoiment_status'

    ];
    public function appoiment()
    {
        return $this->belongsTo(appoiment::class);
    }

}
