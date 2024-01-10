<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CreateController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        return view('pages.admin.userList.create');
    }
}
