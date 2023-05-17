<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Student extends Model
{
    use HasFactory, SoftDeletes;

    
    public function __construct(array $attributes = [])
    {
        parent::__construct($attributes);
        // $this->attributes['added_by'] = session()->get('user_id');
    }


    protected $fillable = [
        'name', 'email', 'address', 'phone_number', 'added_by'
    ];

    public function creator(){
        return $this->belongsTo(User::class, 'added_by');
    }

    public function subjects(){
        return $this->belongsToMany(Subject::class, 'students_subjects');
    }

    
    public function setNameAttribute($value){
        $this->attributes['name'] = ucwords($value);
    }
  

}
