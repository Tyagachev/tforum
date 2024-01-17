<?php

namespace App\Http\Controllers\Theme;

use App\Models\Topic;
use Illuminate\Http\Request;
use Illuminate\View\View;

class SearchController extends BaseController
{
    /**
     * Осуществляет фильтрацию топиков по тегу
     * и редиректит обратно на страницу списка топиков
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $input = $request->all();
        $theme = $this->repository->getOneObj($input['theme_id']);
        $themeTopics = Topic::query()
            ->where('tag_topic', '=', $input['tag_name'])
            ->where('theme_id', '=', $input['theme_id'])->get();
        $tags = $theme->tags;
        return view('pages.theme.show',[$theme], compact('theme','themeTopics', 'tags'));
    }
}
