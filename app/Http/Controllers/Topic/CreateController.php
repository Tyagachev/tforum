<?php

namespace App\Http\Controllers\Topic;

use App\Models\Theme;
use Illuminate\View\View;

class CreateController extends BaseController
{

    /**
     * Страница создания топика
     *
     * @return View
     */
    public function __invoke($id): View
    {
        $theme = Theme::query()->find($id);
        $themeTags = $theme->tags;
        return view('pages.topic.create', [$id], compact('id', 'themeTags'));
    }
}
