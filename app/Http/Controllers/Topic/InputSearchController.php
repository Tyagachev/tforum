<?php

namespace App\Http\Controllers\Topic;

use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\View\View;

class InputSearchController extends BaseController
{
    /**
     * Поиск топика по его названию
     * темы
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $input = $request->input();

        $theme = Theme::query()->findOrFail($input['theme_id']);

        $tags = $theme->tags;

        $themeTopics = $this->service->querySearchTopicPagination($theme, $input);

        return view('pages.theme.show',[$theme->id], compact('themeTopics', 'theme', 'tags'));
    }
}
