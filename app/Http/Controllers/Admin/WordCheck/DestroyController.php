<?php

namespace App\Http\Controllers\Admin\WordCheck;

use App\Http\Controllers\Controller;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    /**
     * Удаление строки из БД
     *
     * @param Request $request
     * @return RedirectResponse
     */
    public function __invoke(Request $request): RedirectResponse
    {
        $wordId = $request->input('word_id');
        $this->wordService->delete($wordId);

        return redirect()->back();
    }
}
