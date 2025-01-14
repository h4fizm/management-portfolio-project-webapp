<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // Seed user data
        $this->call(UserSeeder::class);

        // Seed service data
        $this->call(ServiceSeeder::class);

        // Seed skill data
        $this->call(SkillSeeder::class);

        // Seed project data
        $this->call(ProjectSeeder::class);

        // Contoh seeding user secara langsung (jika perlu):
        // User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);
    }
}
