<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Menambahkan 8 contoh data ke tabel project
        DB::table('project')->insert([
            [
                'project_name' => 'Website E-Commerce',
                'project_description' => 'A website built to sell products online.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 1, // ID service 1
            ],
            [
                'project_name' => 'Mobile App',
                'project_description' => 'An iOS and Android app for social networking.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 2, // ID service 2
            ],
            [
                'project_name' => 'Landing Page',
                'project_description' => 'A landing page for a marketing campaign.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 3, // ID service 3
            ],
            [
                'project_name' => 'Corporate Website',
                'project_description' => 'A website for a corporate company showcasing their services.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 1, // ID service 1
            ],
            [
                'project_name' => 'Custom CMS',
                'project_description' => 'A custom content management system for blogs.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 2, // ID service 2
            ],
            [
                'project_name' => 'Portfolio Website',
                'project_description' => 'A portfolio website for showcasing personal projects.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 3, // ID service 3
            ],
            [
                'project_name' => 'Educational Platform',
                'project_description' => 'An online platform for e-learning courses.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 1, // ID service 1
            ],
            [
                'project_name' => 'Event Management System',
                'project_description' => 'A system for managing events and ticket sales.',
                'project_photo' => '', // Kosongkan foto
                'project_link' => '', // Kosongkan link
                'project_service' => 2, // ID service 2
            ],
        ]);
    }
}
