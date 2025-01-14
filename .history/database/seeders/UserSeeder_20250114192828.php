<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('user')->insert([
            [
                'name' => 'User',
                'name' => 'User',
                'email' => 'user@user.com',
                'password' => Hash::make('password'),
                'upload_resume' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'User1',
                'email' => 'user1@user1.com',
                'password' => Hash::make('password'),
                'upload_resume' => null,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
