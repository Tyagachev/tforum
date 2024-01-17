<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use App\Repository\UserListRepository;
use App\Services\User\UserService;

class BaseController extends Controller
{
    public UserListRepository $repository;
    public UserService $service;

    public function __construct(UserListRepository $repository, UserService $service)
    {
        $this->repository = $repository;
        $this->service = $service;
    }
}
