<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends Controller
{
    /**
     * Страница создания пользователя
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.admin.user-list.create');
    }
}
