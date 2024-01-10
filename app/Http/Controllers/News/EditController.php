<?php

namespace App\Http\Controllers\News;

use App\Http\Controllers\Controller;
use App\Models\News;
use Illuminate\View\View;

class EditController extends Controller
{

    /**
     * Страница редактирования новости
     *
     * @param News $news
     * @return View
     */
    public function __invoke(News $news): View
    {
        $edit = News::query()->find($news->id);

        return view('pages.news.edit',[$news], compact('edit'));
    }
}
