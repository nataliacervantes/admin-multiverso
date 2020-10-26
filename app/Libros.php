<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Libros extends Model
{
    protected $table = 'books';

   public function autores()
   {
       return $this->belongsTo(Escritor::class);
   }
}
