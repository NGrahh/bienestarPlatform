<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Events extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'eventname',
        'picture',
        'place',
        'eventdate',
        'eventlimit',
        'datestar',
        'dateendevent',
        'Subjectevent',
        'status',
    ];
    // Definir la relación con las inscripciones
    public function registrations()
    {
        return $this->hasMany(Event_registrations::class, 'event_id');
    }


    public function programa()
{
    return $this->belongsTo(Programas::class, 'program_id');
}
}
