<?php

namespace App\Http\Controllers\Profile;

use App\Models\User;

class IndexController extends BaseController
{

    /**
     * Страница профиля
     *
     * @param User $user
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke(User $user)
    {
        return view('pages.profile.index', [$user], compact('user'));
    }
}
