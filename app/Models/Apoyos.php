<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoyos extends Model
{
    use HasFactory;

    protected $fillable = [
        'apoyo_id',
        'user_id',
        'mobilenumber',
        'formatuser',
        'photocopy',
        'receipt',
        'sisben',
        'support',

    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación con Apoyos_created
    public function apoyoCreated()
    {
        return $this->belongsTo(Apoyos_created::class, 'apoyo_id');
    }

}
