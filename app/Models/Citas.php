<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Citas extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'user_id',
        'dimensions_id',
        'mobilenumber',
        'hour',
        'date',
        'status',
        'subjectCita',
    ];

    public function typeDimensions()
    {
        return $this->belongsTo(TypeDimensions::class, 'dimensions_id');
    }
    // Relación con el modelo User
    
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' es la clave foránea en la tabla 'perfil'
    }
}
