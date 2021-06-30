<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Eventos extends Model
{
    protected $table = 'eventos';

    protected $fillable = [
        'Evento',
        'Lugar',
        'Fecha',
        'Domicilio',
        'Costo',
        'Cupo',
        'Estado',
        'Ciudad',
        'Hora',
    ];
}
