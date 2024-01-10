<?php

namespace App\Http\Controllers\Welcome;

use App\Http\Controllers\Controller;
use App\Repository\ThemeRepository;

class BaseController extends Controller
{
    public $themeRepository;

    public function __construct(ThemeRepository $themeRepository)
    {
        $this->themeRepository = $themeRepository;
    }
}
