<?php

namespace App\Http\Controllers\Theme;
use App\Models\Theme;
use App\Models\Topic;
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
        $themeId = $this->repository->getOneObj($theme->id);

        $themeTopics = Topic::query()
            ->join('users', 'users.id', '=', 'topics.user_id')
            ->select('topics.*','users.name as user_name')
            ->where('theme_id', '=', $theme->id)->get();

        $tags = $theme->tags;

        return view('pages.theme.show',[$themeId],
            compact('themeTopics', 'theme', 'tags'));
    }
}
