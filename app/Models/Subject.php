<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Subject extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'full_mark',
        'pass_mark'
    ];

    public function setNameAttribute($value) 
    {
        $this->attributes['name'] = ucwords($value);
    }

    public function getCreatedAtAttribute($value)
    {
        return date("d-M-Y H:i:s", strtotime($value));
    }

    public function getUpdatedAtAttribute($value)
    {
        return date("d-M-Y H:i:s", strtotime($value));
    }

}
