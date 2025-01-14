<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ServiceSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('service')->insert([
            [
                'service_name' => 'Web Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Mobile App Development',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'service_name' => 'Digital Marketing',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
