<?php

namespace App\Http\Controllers\Admin\Tag;

use App\Http\Controllers\Controller;
use App\Repository\ThemeRepository;
use App\Services\Tag\TagService;

class BaseController extends Controller
{
    public ThemeRepository $themeRepository;
    public TagService $tagService;

    public function __construct(ThemeRepository $themeRepository, TagService $tagService)
    {
        $this->themeRepository = $themeRepository;
        $this->tagService = $tagService;
    }
}
