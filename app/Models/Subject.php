<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable=[
        'teacher_id',
        'name',
        'full_mark',
        'pass_mark'
    ];

    public function student(){

        return $this->belongsTo(Student::class, 'student_id');
    }

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
