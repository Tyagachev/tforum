<?php

namespace App\Http\Controllers\Profile;

use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    /**
     * Удаление профиля
     * пользователя
     *
     * @param Request $request
     * @return void
     */
    public function __invoke(Request $request)
    {
        $userId = $request->input();
        $this->service->delete($userId['user_id']);
    }
}
