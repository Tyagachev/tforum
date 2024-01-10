<?php

namespace App\Http\Controllers\Theme;
use App\Actions\Theme\ThemeAction;
use App\Http\Controllers\Controller;
use App\Repository\ThemeRepository;
use App\Services\Theme\ThemeService;

class BaseController extends Controller
{
    public ThemeService $service;
    public ThemeAction $action;
    public ThemeRepository $repository;

    public function __construct(ThemeService $service, ThemeAction $action, ThemeRepository $repository)
    {
        $this->service = $service;
        $this->action = $action;
        $this->repository = $repository;
    }
}
