<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Machine extends Model
{
    //

    public function environments()
    {
        return $this->hasMany(Environment::class);
    }

    public function serverProvider()
    {
        return $this->belongsTo(ServerProvider::class);
    }

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function region()
    {
        return $this->belongsTo(Region::class);
    }

    
}
