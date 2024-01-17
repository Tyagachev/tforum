<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\View\View;

class IndexController extends Controller
{
    /**
     * Страница админки
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.admin.index');
    }
}
