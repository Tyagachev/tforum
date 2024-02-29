<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Requests\User\UserDestroyRequest;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * Удаление пользователя
     *
     * @param UserDestroyRequest $request
     * @return RedirectResponse
     */
    public function __invoke(UserDestroyRequest $request): RedirectResponse
    {
        $userId = $request->validated();

        $this->service->delete($userId['id']);

        return redirect()->route('admin.user-list');
    }
}
