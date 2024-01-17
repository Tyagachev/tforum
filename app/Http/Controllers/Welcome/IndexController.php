<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Главная страница
     *
     * @return View
     */
    public function __invoke(): View
    {
        $themes = $this->themeRepository->getAll();
        return view('welcome', compact('themes'));
    }
}
