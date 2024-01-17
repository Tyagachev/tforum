<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Models\Tag;
use App\Models\Theme;
use Illuminate\Support\Facades\DB;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Страница создания тегов
     *
     * @return View
     */
    public function __invoke(): View
    {
        $theme = $this->themeRepository->getAll();
        $tagTheme = DB::select("SELECT * FROM `tag_theme` WHERE 1");

        $result = [];

        foreach ($tagTheme as $el) {
            $tags = Tag::query()->find($el->tag_id);
            $themes = Theme::query()->find($el->theme_id);
            $associate = [
                'tag_id' => $el->tag_id,
                'theme_id' => $el->theme_id,
                'tag_name' => $tags->name,
                'theme_name' => $themes ->title
            ];
            $result[] = (object)$associate;
        }
        return view('pages.admin.tag.index', compact('theme', 'result'));
    }
}
