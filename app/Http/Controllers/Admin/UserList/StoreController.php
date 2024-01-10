<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Requests\User\UserStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Сохранение пользователя
     * в админке
     *
     * @param UserStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(UserStoreRequest $request): RedirectResponse
    {
        $userData = $request->validated();

        $this->service->save($userData);

        return redirect()->route('admin.user-list');
    }
}
