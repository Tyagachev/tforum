<?php

namespace App\Http\Controllers\Theme;
use App\Models\Theme;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * Просмотр сообщества
     *
     * @param Theme $theme
     * @return View
     */
    public function __invoke(Theme $theme): View
    {
        $themeId = $this->repository->getOneObj($theme->id);

        $themeTopics = $this->service->queryTopicPagination($theme);

        $tags = $theme->tags;

        return view('pages.theme.show',[$themeId], compact('themeTopics', 'theme', 'tags'));
    }
}
