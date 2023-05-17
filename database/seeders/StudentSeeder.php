<?php

namespace Database\Seeders;

use App\Models\Student;
use App\Models\Subject;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class StudentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $user_count = User::count();
        
        Student::factory()->count(2000)
        ->create([
            'added_by' => rand(1, $user_count)
        ]);
        $student_count = Student::count();

        for($i=0; $i<$student_count; $i++){
            for($j=1; $j<4; $j++){
                DB::table('students_subjects')->insert([
                    'student_id' => $i + 1,
                    'subject_id' => $j
                ]);
            }
        }
    }
}
