<?php

namespace App\Http\Controllers\News;

use App\Models\News;
use App\Events\NewsHasViewed;
use Illuminate\View\View;

class ShowController extends BaseController
{

    /**
     * Просмотр новости
     *
     * @param News $news
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke(News $news): View
    {
        $newsInner = $this->newsRepository->getOneObj($news->id);

        event(new NewsHasViewed($newsInner));

        return view('pages.news.show',[$news], compact('newsInner'));
    }
}
