<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\View\View;

class IndexController extends BaseController
{

    /**
     * Главная страница новостей
     *
     * @return View
     */
    public function __invoke(): View
    {
        $news = $this->newsRepository->getAll();

        return view('pages.news.index', compact('news'));
    }
}
