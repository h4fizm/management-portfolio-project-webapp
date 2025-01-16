<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class SkillSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('skill')->insert([
            [
                'skill_name' => 'PHP',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skill_name' => 'JavaScript',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skill_name' => 'Laravel',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skill_name' => 'React',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'skill_name' => 'MySQL',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
