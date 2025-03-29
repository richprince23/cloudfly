<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Environment extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'description',
        'status',
        'server_id',
        'region',
        'os',
        'machine_type',
    ];

    public function server()
    {
        return $this->belongsTo(Server::class);
    }

    public function serverProvider()
    {
        return $this->belongsTo(ServerProvider::class);
    }
    
}
