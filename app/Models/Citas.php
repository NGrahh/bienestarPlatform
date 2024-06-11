<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Validation\Rules\Dimensions;

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

    public function typeDimensions()
    {
        return $this->belongsTo(TypeDimensions::class, 'dimensions_id');
    }
}
