<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * Просмотр карточки пользователя
     *
     * @param string $id
     * @return View
     */
    public function __invoke(string $id): View
    {
        $userObj = $this->repository->getOneObj($id);

        return view('pages.admin.userList.show', [$userObj], compact('userObj'));
    }
}
