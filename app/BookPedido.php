<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BookPedido extends Model
{
    protected $table = 'pivotbookpedido';

    public function books()
    {
        return $this->belongsTo(Libros::class);
    }
}
