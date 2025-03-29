<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('servers', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_provider_id')->constrained('server_providers');
            $table->string('name');
            $table->string('access_key')->nullable();
            $table->string('api_key')->nullable();
            // $table->string('api_url')->nullable();
            // $table->string('api_version')->nullable();
            $table->string('api_endpoint')->nullable();
            $table->string('ssh_ip_address')->nullable();
            $table->integer('ssh_port')->nullable();
            $table->text('public_key')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('servers');
    }
};
