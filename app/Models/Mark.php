<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mark extends Model
{
    use HasFactory;

    protected $fillable = [
        'full_mark', 'pass_mark','obtained_mark','subject_id','student_id','exam_id','added_by'
    ];
    public function student(){

        return $this->belongsTo(student::class, 'Student_id');
    }
    public function sublject(){

        return $this->belongsTo(subject::class, 'Subject_id');
    }
    public function exam(){

        return $this->belongsTo(subject::class, 'Exam_id');
    }
    
}
