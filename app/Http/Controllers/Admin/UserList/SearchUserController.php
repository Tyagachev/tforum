<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchUserController extends Controller
{
    /**
     * Поиск пользователя по никнейму
     *
     * @param Request $request
     * @return View|RedirectResponse
     */
    public function __invoke(Request $request): View|RedirectResponse
    {
        $user = $request->input();

        $usersList = User::query()->
        where('name','like','%' . $user['user_name'] . '%')->get();
        if (count($usersList) == 0) {
            return redirect()->back()->with('not_found','Пользователь не найден');
        }
        return view('pages.admin.userList.index', compact('usersList'));

    }
}
