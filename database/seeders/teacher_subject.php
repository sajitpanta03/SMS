<?php

namespace Database\Seeders;

use App\Models\Subject;
use App\Models\Teacher;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class teacher_subject extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $subject_count = Subject::count();
        $teachers = Teacher::all();
        //dd($teachers);
        foreach ($teachers as $teacher) {
            $teacher->subject()->attach(rand(1, $subject_count));
        }
    }
}
