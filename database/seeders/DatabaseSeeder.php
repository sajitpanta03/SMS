<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Student;
use App\Models\User;
use App\Models\Subject;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        User::create([
            'name' => 'David Chamling Rai',
            'email' => 'DavidRai441@gmail.com',
            'address' => 'Imadol, Lalitpur',
            'phone_number' => '9801112223',
            'email_verified_at' => now(),
            'password' => '$2a$12$Le6slh7gVWZSfS0NgQeykuV2RZr/cLPi1oluGWJ1X9KbBx3O8/WoO', // admin
            'created_by' => null
        ]);
        $this->call([
            UserSeeder::class,
            StudentSeeder::class
        ]); 

        // User::factory(10)->has(
        //     Student::factory()->count(3)
        // )->create();
    }
}
