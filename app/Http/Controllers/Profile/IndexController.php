<?php

namespace App\Http\Controllers\Profile;

use App\Models\Comment;
use App\Models\User;
use Illuminate\View\View;

class IndexController extends BaseController
{

    /**
     * Страница профиля пользователя
     *
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        $userCommentsCount = Comment::query()->where('user_id', $user->id)->get();

        return view('pages.profile.index', [$user],
            compact('user', 'userCommentsCount'));
    }
}
