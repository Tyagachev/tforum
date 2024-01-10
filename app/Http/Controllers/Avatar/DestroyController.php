<?php

namespace App\Http\Controllers\Avatar;

use App\Http\Requests\Avatar\AvatarDestroyRequest;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * Удаление файла и
     * записи в БД
     *
     * @param AvatarDestroyRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(AvatarDestroyRequest $request): RedirectResponse
    {
        $userId = $request->input();

        $serchAvatarObject = $this->avatarService->searchAvatar($userId['id']);
        $deleteAvatarFile = $this->avatarAction->deleteFile($serchAvatarObject);

        if ($deleteAvatarFile) {
            $this->avatarService->delete($serchAvatarObject->user_id);
            return redirect()->back()->with('success', 'Файл удален');
        }
        return redirect()->back()->with('error', 'Ошибка при удалении файла');
    }
}
