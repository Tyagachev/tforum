<?php

namespace App\Http\Controllers\Avatar;

use App\Http\Requests\Avatar\AvatarStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Загрузка файла аватарки
     * в БД и на диск
     *
     * @param AvatarStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(AvatarStoreRequest $request): RedirectResponse
    {
        $request->validated();
        $avatarFileLoad = $this->avatarAction->saveFile($request);
        if ($avatarFileLoad) {
            $this->avatarService->save($avatarFileLoad);
            return redirect()->back()->with('success', 'Аватарка была добавлена');
        }
        return redirect()->back()->with('error', 'Произошла ошибка при загрузке');
    }
}
