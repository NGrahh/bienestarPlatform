<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Apoyos extends Model
{
    use HasFactory;

    protected $fillable = [
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

}
