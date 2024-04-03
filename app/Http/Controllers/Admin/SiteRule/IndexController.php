<?php

namespace App\Http\Controllers\Admin\SiteRule;

use App\Models\SiteRule;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Страница вывода правил в админке
     *
     * @return View
     */
    public function __invoke(): View
    {
        $ruleList = SiteRule::all();

        return view('pages.admin.site-rule.index', compact('ruleList'));
    }
}
