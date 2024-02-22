<?php

namespace App\Http\Controllers\Profile;

use App\Http\Controllers\Controller;
use App\Services\User\UserService;

class BaseController extends Controller
{
    public UserService $service;

    public function __construct(UserService $service)
    {
        $this->service = $service;
    }
}
