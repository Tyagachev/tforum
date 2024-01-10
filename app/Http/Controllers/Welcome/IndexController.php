<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke()
    {
        $themes = $this->themeRepository->getAll();
        return view('welcome', compact('themes'));
    }
}
