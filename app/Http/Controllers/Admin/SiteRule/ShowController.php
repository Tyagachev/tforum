<?php

namespace App\Http\Controllers\Admin\SiteRule;

use App\Http\Controllers\Controller;
use App\Models\SiteRule;
use Illuminate\View\View;

class ShowController extends Controller
{
    /**
     * Страница вывода правил
     * со стороны пользователя
     *
     * @return View
     */
    public function __invoke(): View
    {
        $rules = SiteRule::all();
        return view('pages.admin.site-rule.show', compact('rules'));
    }
}
