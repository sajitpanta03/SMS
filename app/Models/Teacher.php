<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $fillable=[
        'name',
        'address',
        'phone_number',
        'email'
    ];

    public function teacher_subject(){
        return $this->hasMany(teacher_subject::class);
    }

    public function subject(){
        return $this->belongsToMany(Subject::class, "teacher_subjects");
    }

}
