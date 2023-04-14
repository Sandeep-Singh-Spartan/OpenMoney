<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class OnboardingStatusSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        DB::table('onboarding_statuses')->insert([
            ['name' => 'Registration Initiated'],
            ['name' => 'Registered'],
            ['name' => 'Blocked'],
            ['name' => 'Deleted'],
        ]);
    }
}
