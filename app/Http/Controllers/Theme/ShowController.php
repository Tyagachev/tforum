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
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke(Theme $theme): View
    {
        $themeTopics = $theme->topics;
        $theme = $this->repository->getOneObj($theme->id);
        $tags = $theme->tags;
        return view('pages.theme.show',[$theme],
            compact('themeTopics', 'theme', 'tags'));
    }
}
