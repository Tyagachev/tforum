<?php

namespace App\Http\Controllers\Comment;

use App\Http\Requests\Comment\CommentStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{

    /**
     * Сохранение комментария
     *
     * @param CommentStoreRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(CommentStoreRequest $request): RedirectResponse
    {
        $commentData = $request->validated();
        $storeComment = $this->service->save($commentData);
        if ($storeComment) {
            return redirect()->back()->with('success', 'Комментарий добавлен');
        }
        return redirect()->back()->with('error', 'Не удалось добавить комментарий');;
    }
}
