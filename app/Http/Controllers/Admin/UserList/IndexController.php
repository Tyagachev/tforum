<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Список зарегистрированных
     * пользователей
     *
     * @return View
     */
    public function __invoke(): View
    {
        $usersList = $this->repository->getAll();

        return view('pages.admin.userList.index', compact('usersList'));
    }
}
