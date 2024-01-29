<?php

namespace App\Http\Controllers\Admin\Tag;

use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Страница
     * создания тегов
     *
     * @return View
     */
    public function __invoke(): View
    {
        $theme = $this->themeRepository->getAll();

        $result = DB::table('tag_theme')
            ->select( 'tag_theme.tag_id','tag_theme.theme_id','tags.name', 'themes.title')
            ->join('tags', 'tags.id', '=', 'tag_theme.tag_id')
            ->join('themes', 'themes.id', '=', 'tag_theme.theme_id')
            ->get();

        return view('pages.admin.tag.index', compact('theme', 'result'));
    }
}
