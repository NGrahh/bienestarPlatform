<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Perfil extends Model
{
    use HasFactory;

    protected $table = 'perfil';
    protected $primaryKey = 'user_id'; // Si `user_id` es la clave primaria
    public $incrementing = false; // Si `user_id` no es un campo autoincremental

    protected $fillable = [
        'user_id',
        'pictureuser',
    ];
    // Relación con el modelo User
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id'); // 'user_id' es la clave foránea en la tabla 'perfil'
    }

}
