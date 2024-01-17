<?php

namespace App\Http\Controllers\Theme;

use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Создание сообщества
     *
     * @return View
     */
    public function __invoke(): View
    {
        return view('pages.theme.create');
    }
}
