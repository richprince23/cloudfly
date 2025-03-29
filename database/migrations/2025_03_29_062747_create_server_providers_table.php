<?php

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('server_providers', function (Blueprint $table) {
            $table->id();
            $table->string('name')->unique();
            $table->string('slug')->unique();
            $table->string('description')->nullable();
            $table->string('image')->nullable();
            $table->timestamps();
        });

        // insert default data
        DB::table('server_providers')->insert([
            'name' => 'DigitalOcean',
            'slug' => 'digitalocean',
            'description' => 'DigitalOcean is a cloud computing platform that allows users to build, test, and deploy applications that use our scalable infrastructure.',
        ]);

        DB::table('server_providers')->insert([
            'name' => 'AWS',
            'slug' => 'aws',
            'description' => 'AWS is a cloud computing platform that allows users to build, test, and deploy applications that use our scalable infrastructure.',
        ]);

        DB::table('server_providers')->insert([
            'name' => 'VPS',
            'slug' => 'vps',
            'description' => 'Use your own server or VPS to host your applications.',
        ]);
        
        
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_providers');
    }
};
