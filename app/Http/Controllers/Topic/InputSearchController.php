<?php

namespace App\Http\Controllers\Topic;

use App\Models\Theme;
use App\Models\Topic;
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
        $input = $request->all();
        $theme = Theme::query()->findOrFail($input['theme_id']);
        $tags = $theme->tags;
        $themeTopics = Topic::query()->where( 'title','like', '%' . $input['theme_name'] . '%')
            ->where('theme_id','=', $theme->id)
            ->get();
        return view('pages.theme.show',[$theme->id],
        compact('themeTopics', 'theme', 'tags'));
    }
}
