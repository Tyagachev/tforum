<?php

namespace App\Http\Controllers\Admin\WordCheck;

use App\Models\WordCheck;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Страница добавления проверочного
     * слова
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $word = WordCheck::all();
        return view('pages.admin.word-check.index', compact('word'));
    }
}
