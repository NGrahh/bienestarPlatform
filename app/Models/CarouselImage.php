<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CarouselImage extends Model
{
    use HasFactory;

    // Definir la tabla asociada, si no sigue la convención plural
    protected $table = 'carousel_images';

    // Definir los campos que se pueden llenar
    protected $fillable = ['image'];
}
