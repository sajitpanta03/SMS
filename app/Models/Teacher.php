<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Teacher extends Model
{
    use HasFactory;

    protected $table="teachers";
    protected $primarykey="id";

    protected $fillable=[
        'name',
        'address',
        'phone_number',
        'email'
    ];

    public function teacher_subject(){
        return $this->hasOne(teacher_subject::class, 'teacher_id');
    }

}
