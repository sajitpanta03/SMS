<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Api\SuperApiController;

class UserController extends SuperApiController
{
    protected $whichModel;

    public function __construct()
    {
        parent::__construct(User::class);
    }
}
