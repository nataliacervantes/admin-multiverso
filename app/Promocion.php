<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    public static $Tipos = [
        'Porcentaje' => 'Porcentaje',
        'Dinero' => 'Dinero',
        'Sin Costo de Envío' => 'Sin Costo de Envío',
    ];
}
