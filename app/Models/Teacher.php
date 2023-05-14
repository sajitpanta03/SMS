<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\teachers_subject;

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
        return $this->hasMany(teachers_subject::class);
    }

    public function subject(){
        return $this->belongsToMany(Subject::class, 'teachers_subjects');
    }

}
