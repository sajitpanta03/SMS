<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'Admin',
            'email' => 'admin@gmail.com',
            'address' => 'Admin',
            'phone_number' => '9801112223',
            'email_verified_at' => now(),
            'password' => bcrypt('admin'), // admin
            'created_by' => null
        ]);
        Subject::factory(20)->create();
        Teacher::factory(2000)->create();
        $this->call([
            UserSeeder::class,
            StudentSeeder::class,
            teacher_subject::class
        ]); 
    }
}
