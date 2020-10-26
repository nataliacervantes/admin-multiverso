<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Escritor extends Model
{
    protected $table = 'autores';

    protected $fillable = [
        'Nombre',
        'Descripcion'
    ];


}
