<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Server extends Model
{
    protected $fillable = [
        'server_provider_id',
        'name',
        'access_key',
        'api_key',
        'api_endpoint',
        'ssh_ip_address',
        'ssh_port',
        'ssh_public_key',
    ];

    public function serverProvider()
    {
        return $this->belongsTo(ServerProvider::class);
    }
}
