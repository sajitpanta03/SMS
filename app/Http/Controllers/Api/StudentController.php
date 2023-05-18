<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Controllers\Api\SuperApiController;
use App\Models\Student;
use Illuminate\Http\Request;

class StudentController extends SuperApiController
{
    protected $whichModel;

    public function __construct()
    {
        parent::__construct(Student::class);
    }
}
