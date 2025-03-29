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
        Schema::create('regions', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('slug')->unique();
            $table->foreignId('server_provider_id')->constrained('server_providers');
            $table->string('description')->nullable();
            $table->string('status')->default('inactive');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('regions');
    }


    private function seedRegions()
    {
        $regionsData = [
            'aws' => [
                ['name' => 'US East (N. Virginia)', 'slug' => 'us-east-1', 'description' => 'Primary AWS region in the US.'],
                ['name' => 'US East (Ohio)', 'slug' => 'us-east-2', 'description' => 'AWS region in Ohio.'],
                ['name' => 'US West (N. California)', 'slug' => 'us-west-1', 'description' => 'AWS region in Northern California.'],
                ['name' => 'US West (Oregon)', 'slug' => 'us-west-2', 'description' => 'West coast AWS region.'],
                ['name' => 'Africa (Cape Town)', 'slug' => 'af-south-1', 'description' => 'AWS region in South Africa.'],
                ['name' => 'Asia Pacific (Hong Kong)', 'slug' => 'ap-east-1', 'description' => 'AWS region in Hong Kong.'],
                ['name' => 'Asia Pacific (Jakarta)', 'slug' => 'ap-southeast-3', 'description' => 'AWS region in Indonesia.'],
                ['name' => 'Asia Pacific (Mumbai)', 'slug' => 'ap-south-1', 'description' => 'AWS region in India.'],
                ['name' => 'Asia Pacific (Osaka)', 'slug' => 'ap-northeast-3', 'description' => 'AWS region in Japan (Osaka).'],
                ['name' => 'Asia Pacific (Seoul)', 'slug' => 'ap-northeast-2', 'description' => 'AWS region in South Korea.'],
                ['name' => 'Asia Pacific (Singapore)', 'slug' => 'ap-southeast-1', 'description' => 'AWS region in Singapore.'],
                ['name' => 'Asia Pacific (Sydney)', 'slug' => 'ap-southeast-2', 'description' => 'AWS region in Australia.'],
                ['name' => 'Asia Pacific (Tokyo)', 'slug' => 'ap-northeast-1', 'description' => 'AWS region in Japan (Tokyo).'],
                ['name' => 'Canada (Central)', 'slug' => 'ca-central-1', 'description' => 'AWS region in Canada.'],
                ['name' => 'Europe (Frankfurt)', 'slug' => 'eu-central-1', 'description' => 'AWS region in Germany.'],
                ['name' => 'Europe (Ireland)', 'slug' => 'eu-west-1', 'description' => 'AWS region in Ireland.'],
                ['name' => 'Europe (London)', 'slug' => 'eu-west-2', 'description' => 'AWS region in the UK.'],
                ['name' => 'Europe (Milan)', 'slug' => 'eu-south-1', 'description' => 'AWS region in Italy.'],
                ['name' => 'Europe (Paris)', 'slug' => 'eu-west-3', 'description' => 'AWS region in France.'],
                ['name' => 'Europe (Stockholm)', 'slug' => 'eu-north-1', 'description' => 'AWS region in Sweden.'],
                ['name' => 'Middle East (Bahrain)', 'slug' => 'me-south-1', 'description' => 'AWS region in Bahrain.'],
                ['name' => 'South America (São Paulo)', 'slug' => 'sa-east-1', 'description' => 'AWS region in Brazil.'],
            ],
            'digitalocean' => [
                ['name' => 'New York 1', 'slug' => 'nyc1', 'description' => 'DigitalOcean region in NYC.'],
                ['name' => 'New York 2', 'slug' => 'nyc2', 'description' => 'DigitalOcean region in NYC.'],
                ['name' => 'New York 3', 'slug' => 'nyc3', 'description' => 'DigitalOcean region in NYC.'],
                ['name' => 'San Francisco 1', 'slug' => 'sfo1', 'description' => 'DigitalOcean region in SF.'],
                ['name' => 'San Francisco 2', 'slug' => 'sfo2', 'description' => 'DigitalOcean region in SF.'],
                ['name' => 'San Francisco 3', 'slug' => 'sfo3', 'description' => 'DigitalOcean region in SF.'],
                ['name' => 'Amsterdam 2', 'slug' => 'ams2', 'description' => 'DigitalOcean region in Amsterdam.'],
                ['name' => 'Amsterdam 3', 'slug' => 'ams3', 'description' => 'DigitalOcean region in Amsterdam.'],
                ['name' => 'Singapore 1', 'slug' => 'sgp1', 'description' => 'DigitalOcean region in Singapore.'],
                ['name' => 'London 1', 'slug' => 'lon1', 'description' => 'DigitalOcean region in London.'],
                ['name' => 'Frankfurt 1', 'slug' => 'fra1', 'description' => 'DigitalOcean region in Frankfurt.'],
                ['name' => 'Toronto 1', 'slug' => 'tor1', 'description' => 'DigitalOcean region in Toronto.'],
                ['name' => 'Bangalore 1', 'slug' => 'blr1', 'description' => 'DigitalOcean region in India.'],
                ['name' => 'Sydney 1', 'slug' => 'syd1', 'description' => 'DigitalOcean region in Australia.'],
            ],


        ];

        // Fetch server provider IDs
        $providers = [
            'aws' => DB::table('server_providers')->where('slug', 'aws')->value('id'),
            'digitalocean' => DB::table('server_providers')->where('slug', 'digitalocean')->value('id'),
        ];

        foreach ($regionsData as $provider => $regions) {
            if (!isset($providers[$provider])) {
                continue; // Skip if provider doesn't exist
            }

            foreach ($regions as $region) {
                DB::table('regions')->updateOrInsert(
                    ['slug' => $region['slug']],
                    [
                        'name' => $region['name'],
                        'slug' => $region['slug'],
                        'server_provider_id' => $providers[$provider],
                        'description' => $region['description'] ?? null,
                        'status' => 'active',
                        'created_at' => now(),
                        'updated_at' => now(),
                    ]
                );
            }
        }
    }
};
