<?php

namespace App\Http\Controllers\Admin\CommentList;

use App\Http\Requests\WordCheck\WordCheck;

class StoreController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(WordCheck $request)
    {
        $word = $request->validated();
        $this->commentListService->save($word);

    }
}
