<?php

namespace App\Http\Controllers\Theme;

use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends BaseController
{
    /**
     * Создание сообщества
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Foundation\Application
     */
    public function __invoke(Request $request): View
    {
        return view('pages.theme.create');
    }
}
