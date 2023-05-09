<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class teacher_subject extends Model
{
    use HasFactory;

    protected $table="teacher_subjects";

    protected $fillable=[
        'teacher_id',
        'subject_id'

    ];

    public function teacher(){
        return $this->belongsTo(Teacher::class);
    }
}
