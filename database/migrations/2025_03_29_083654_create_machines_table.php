<?php

// Migration File
use App\Models\ServerProvider;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;


return new class extends Migration {
    public function up()
    {
        Schema::create('machines', function (Blueprint $table) {
            $table->id();
            $table->foreignId('server_provider_id')->constrained('server_providers');
            $table->string('name');
            $table->text('description')->nullable();
            $table->timestamps();
        });

        // Insert Data
        $instances =  [

            ["provider" => "aws", "name" => "t3.nano", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],
            ["provider" => "aws", "name" => "t3.micro", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],
            ["provider" => "aws", "name" => "t3.small", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],
            ["provider" => "aws", "name" => "t3.medium", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],
            ["provider" => "aws", "name" => "t3.large", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],
            ["provider" => "aws", "name" => "t3.xlarge", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],
            ["provider" => "aws", "name" => "t3.2xlarge", "description" => "Burstable performance instances with a balance of compute, memory, and networking."],

            ["provider" => "aws", "name" => "t3a.nano", "description" => "AMD-based instances similar to T3 with lower cost."],
            ["provider" => "aws", "name" => "t3a.micro", "description" => "AMD-based instances similar to T3 with lower cost."],
            ["provider" => "aws", "name" => "t3a.small", "description" => "AMD-based instances similar to T3 with lower cost."],
            ["provider" => "aws", "name" => "t3a.medium", "description" => "AMD-based instances similar to T3 with lower cost."],
            ["provider" => "aws", "name" => "t3a.large", "description" => "AMD-based instances similar to T3 with lower cost."],
            ["provider" => "aws", "name" => "t3a.xlarge", "description" => "AMD-based instances similar to T3 with lower cost."],
            ["provider" => "aws", "name" => "t3a.2xlarge", "description" => "AMD-based instances similar to T3 with lower cost."],

            ["provider" => "aws", "name" => "m5.large", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.2xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.4xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.8xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.12xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.16xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],
            ["provider" => "aws", "name" => "m5.24xlarge", "description" => "General purpose instances providing a balance of compute, memory, and network resources."],

            ["provider" => "aws", "name" => "c5.large", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.2xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.4xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.9xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.12xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.18xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],
            ["provider" => "aws", "name" => "c5.24xlarge", "description" => "Compute-optimized instances for compute-intensive workloads."],

            ["provider" => "aws", "name" => "r5.large", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.2xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.4xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.8xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.12xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.16xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],
            ["provider" => "aws", "name" => "r5.24xlarge", "description" => "Memory-optimized instances designed for memory-intensive applications."],

            ["provider" => "aws", "name" => "g4dn.xlarge", "description" => "GPU-based instances for machine learning and graphics-intensive applications."],
            ["provider" => "aws", "name" => "g4dn.2xlarge", "description" => "GPU-based instances for machine learning and graphics-intensive applications."],
            ["provider" => "aws", "name" => "g4dn.4xlarge", "description" => "GPU-based instances for machine learning and graphics-intensive applications."],
            ["provider" => "aws", "name" => "g4dn.8xlarge", "description" => "GPU-based instances for machine learning and graphics-intensive applications."],
            ["provider" => "aws", "name" => "g4dn.16xlarge", "description" => "GPU-based instances for machine learning and graphics-intensive applications."],

            ["provider" => "aws", "name" => "p3.2xlarge", "description" => "Accelerated computing instances with NVIDIA Tesla V100 GPUs for high-performance computing."],
            ["provider" => "aws", "name" => "p3.8xlarge", "description" => "Accelerated computing instances with NVIDIA Tesla V100 GPUs for high-performance computing."],
            ["provider" => "aws", "name" => "p3.16xlarge", "description" => "Accelerated computing instances with NVIDIA Tesla V100 GPUs for high-performance computing."],
            ["provider" => "digitalocean", "name" => "s-1vcpu-1gb", "description" => "Basic droplet with 1 vCPU and 1GB RAM for small applications and development environments."],
            ["provider" => "digitalocean", "name" => "s-1vcpu-2gb", "description" => "Basic droplet with 1 vCPU and 2GB RAM for small applications with more memory requirements."],
            ["provider" => "digitalocean", "name" => "s-2vcpu-2gb", "description" => "Standard droplet with 2 vCPUs and 2GB RAM for websites and small applications."],
            ["provider" => "digitalocean", "name" => "s-2vcpu-4gb", "description" => "Standard droplet with 2 vCPUs and 4GB RAM for websites and applications with moderate traffic."],
            ["provider" => "digitalocean", "name" => "s-4vcpu-8gb", "description" => "Standard droplet with 4 vCPUs and 8GB RAM for production applications and databases."],
            ["provider" => "digitalocean", "name" => "s-8vcpu-16gb", "description" => "Standard droplet with 8 vCPUs and 16GB RAM for high-traffic applications and CI/CD processes."],
            ["provider" => "digitalocean", "name" => "s-8vcpu-32gb", "description" => "Memory-optimized droplet with 8 vCPUs and 32GB RAM for memory-intensive applications."],
            ["provider" => "digitalocean", "name" => "s-16vcpu-64gb", "description" => "High-performance droplet with 16 vCPUs and 64GB RAM for enterprise applications and large databases."],
            ["provider" => "digitalocean", "name" => "s-24vcpu-128gb", "description" => "High-performance droplet with 24 vCPUs and 128GB RAM for intensive computational workloads."],
            ["provider" => "digitalocean", "name" => "s-32vcpu-192gb", "description" => "High-performance droplet with 32 vCPUs and 192GB RAM for the most demanding applications."],

            ["provider" => "digitalocean", "name" => "c-2", "description" => "CPU-optimized droplet with 2 dedicated vCPUs and 4GB RAM for CPU-intensive applications."],
            ["provider" => "digitalocean", "name" => "c-4", "description" => "CPU-optimized droplet with 4 dedicated vCPUs and 8GB RAM for CPU-intensive applications."],
            ["provider" => "digitalocean", "name" => "c-8", "description" => "CPU-optimized droplet with 8 dedicated vCPUs and 16GB RAM for CPU-intensive applications."],
            ["provider" => "digitalocean", "name" => "c-16", "description" => "CPU-optimized droplet with 16 dedicated vCPUs and 32GB RAM for CPU-intensive applications."],
            ["provider" => "digitalocean", "name" => "c-32", "description" => "CPU-optimized droplet with 32 dedicated vCPUs and 64GB RAM for CPU-intensive applications."],

            ["provider" => "digitalocean", "name" => "m-2vcpu-16gb", "description" => "Memory-optimized droplet with 2 vCPUs and 16GB RAM for memory-intensive applications."],
            ["provider" => "digitalocean", "name" => "m-4vcpu-32gb", "description" => "Memory-optimized droplet with 4 vCPUs and 32GB RAM for memory-intensive applications."],
            ["provider" => "digitalocean", "name" => "m-8vcpu-64gb", "description" => "Memory-optimized droplet with 8 vCPUs and 64GB RAM for memory-intensive applications."],
            ["provider" => "digitalocean", "name" => "m-16vcpu-128gb", "description" => "Memory-optimized droplet with 16 vCPUs and 128GB RAM for memory-intensive applications."],
            ["provider" => "digitalocean", "name" => "m-24vcpu-192gb", "description" => "Memory-optimized droplet with 24 vCPUs and 192GB RAM for memory-intensive applications."],
            ["provider" => "digitalocean", "name" => "m-32vcpu-256gb", "description" => "Memory-optimized droplet with 32 vCPUs and 256GB RAM for memory-intensive applications."],

            ["provider" => "digitalocean", "name" => "g-2vcpu-8gb", "description" => "General purpose droplet with SSD for balanced workloads."],
            ["provider" => "digitalocean", "name" => "g-4vcpu-16gb", "description" => "General purpose droplet with SSD for balanced workloads."],
            ["provider" => "digitalocean", "name" => "g-8vcpu-32gb", "description" => "General purpose droplet with SSD for balanced workloads."],
            ["provider" => "digitalocean", "name" => "g-16vcpu-64gb", "description" => "General purpose droplet with SSD for balanced workloads."],

            ["provider" => "digitalocean", "name" => "so-2vcpu-16gb", "description" => "Storage-optimized droplet with NVMe SSD for data-intensive applications."],
            ["provider" => "digitalocean", "name" => "so-4vcpu-32gb", "description" => "Storage-optimized droplet with NVMe SSD for data-intensive applications."],
            ["provider" => "digitalocean", "name" => "so-8vcpu-64gb", "description" => "Storage-optimized droplet with NVMe SSD for data-intensive applications."],
            ["provider" => "digitalocean", "name" => "so-16vcpu-128gb", "description" => "Storage-optimized droplet with NVMe SSD for data-intensive applications."],

        ];


        $data = [];
        foreach ($instances as $instance) {
            $data[] = [
                'server_provider_id' => ServerProvider::where('slug', $instance['provider'])->first()->id,
                'name' => $instance['name'],
                'description' => $instance['description'],
                'created_at' => now(),
                'updated_at' => now(),
            ];
        }


        DB::table('machines')->insert($data);
    }

    public function down()
    {
        Schema::dropIfExists('machines');
    }
};
