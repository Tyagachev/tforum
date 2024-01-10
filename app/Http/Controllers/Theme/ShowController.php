<?php

namespace App\Http\Controllers\Theme;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * Просмотр сообщества
     *
     * @param Theme $theme
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke(Theme $theme): View
    {
        $themeTopics = $theme->topics->all();
        return view('pages.theme.show',[$theme], compact('themeTopics', 'theme'));
    }
}
