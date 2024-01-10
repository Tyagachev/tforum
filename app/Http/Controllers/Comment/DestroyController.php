<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Http\Requests\Comment\CommentDestroyRequest;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    /**
     * Удаление коммента
     * Handle the incoming request.
     */
    public function __invoke(CommentDestroyRequest $request)
    {
        $deleteComment = $this->service->delete($request->validated());
        if ($deleteComment) {
            return redirect()->back()->with('success', 'Комментарий удален');
        }
        return redirect()->back()->with('error', 'Произошла ошибка при удалении');
    }
}
