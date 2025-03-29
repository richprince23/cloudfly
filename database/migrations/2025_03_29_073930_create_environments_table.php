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
        Schema::create('environments', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug');
            $table->string('description')->nullable();
            $table->string('status')->default('inactive');
            $table->string('server_id');
            $table->string('region')->default('us-east-2');
            $table->string('os')->default('ubuntu-22.04');
            $table->string('machine_type')->default('none');

            // save this for app config later
            // $table->string('storage_type')->default('none');
            // $table->string('storage_size')->default('none');
            // $table->string('storage_iops')->default('none');
            // $table->string('storage_throughput')->default('none');
            // $table->string('storage_encryption')->default('none');
            // $table->string('storage_backup')->default('none');

            // save this for app config later
            // $table->string('php_version')->default('8.0');
            // $table->string('database_name')->nullable();
            // $table->string('database_username')->nullable();
            // $table->string('database_password')->nullable();
            // $table->string('database_host')->nullable();
            // $table->string('database_port')->nullable();
            // $table->string('database_connection')->default('none');
            // $table->string('database_version')->default('none');
            // $table->string('database_charset')->default('utf8mb4');
            // $table->string('database_collation')->default('utf8mb4_unicode_ci');
            // $table->string('database_timezone')->default('UTC');
            // $table->string('database_prefix')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('environments');
    }
};
