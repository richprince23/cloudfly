<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Region extends Model
{
    //


    public function machines()
    {
        return $this->hasMany(Machine::class);
    }

    public function serverProvider()
    {
        return $this->belongsTo(ServerProvider::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function environment()
    {
        return $this->belongsTo(Environment::class);
    }

    
}
