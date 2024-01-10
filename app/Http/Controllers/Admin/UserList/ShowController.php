<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class ShowController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke($id)
    {
        $userObj = $this->repository->getOneObj($id);

        return view('pages.admin.userList.show', [$userObj], compact('userObj'));
    }
}
