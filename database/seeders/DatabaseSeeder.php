<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    use WithoutModelEvents;

    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // 1. Discipline Chair (Admin)
        \App\Models\User::factory()->create([
            'name' => 'Discipline Chair',
            'identity_number' => 'EMP-001', // Login with this ID
            'role' => 'discipline_chair',
            'email' => 'chair@school.edu', 
            'password' => bcrypt('password'), // Password is "password"
        ]);

        // 2. Principal
        \App\Models\User::factory()->create([
            'name' => 'School Principal',
            'identity_number' => 'EMP-002',
            'role' => 'principal',
            'password' => bcrypt('password'),
        ]);

        // 3. Assistant Principal
        \App\Models\User::factory()->create([
            'name' => 'Asst. Principal',
            'identity_number' => 'EMP-003',
            'role' => 'asst_principal',
            'password' => bcrypt('password'),
        ]);

        // 4. Class Adviser
        \App\Models\User::factory()->create([
            'name' => 'Class Adviser',
            'identity_number' => 'EMP-004',
            'role' => 'adviser',
            'password' => bcrypt('password'),
        ]);
        
        // 5. Sample Student
        \App\Models\User::factory()->create([
            'name' => 'John Doe',
            'identity_number' => 'STU-2024-001', 
            'role' => 'student',
            'password' => bcrypt('password'),
        ]);
        
        // 6. Sample Parent
        \App\Models\User::factory()->create([
            'name' => 'Jane Doe (Parent)',
            'identity_number' => 'PAR-2024-001', 
            'role' => 'parent',
            'password' => bcrypt('password'),
        ]);
    }
}
