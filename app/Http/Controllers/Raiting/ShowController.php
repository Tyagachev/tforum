<?php

namespace App\Http\Controllers\Raiting;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;

class ShowController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(User $user)
    {
        $userTopics = $user->topics;
        return view('pages.raiting.userTopics',[$user], compact('user','userTopics'));
    }
}
