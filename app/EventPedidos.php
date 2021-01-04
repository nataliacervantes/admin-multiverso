<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class EventPedidos extends Model
{
    protected $table = 'eventpedidos';

    public function evento()
    {
        return $this->belongsTo(Eventos::class,'events_id');
    }
}
