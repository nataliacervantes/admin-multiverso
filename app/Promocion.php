<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Promocion extends Model
{
    protected $table = 'promociones';

    public static $Tipos = [
        '0' => 'Tipo de Promo',
        '1' => 'Porcentaje',
        '2' => 'Dinero',
        '3' => 'Sin Costo de Envío',
    ];
}
