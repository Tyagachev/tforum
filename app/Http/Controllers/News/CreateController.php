<?php

namespace App\Http\Controllers\News;

use Illuminate\View\View;

class CreateController extends BaseController
{

    /**
     * Страница создания новости
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.news.create');
    }
}
