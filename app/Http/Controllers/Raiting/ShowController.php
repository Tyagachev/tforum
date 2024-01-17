<?php

namespace App\Http\Controllers\Raiting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * Просмотр постов пользователя
     *
     * @param User $user
     * @return View
     */
    public function __invoke(User $user): View
    {
        $userTopics = $user->topics;
        return view('pages.raiting.userTopics',[$user], compact('user','userTopics'));
    }
}
