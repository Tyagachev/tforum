<?php

namespace App\Http\Controllers\News;
use App\Http\Controllers\Controller;
use App\Repository\NewsRepository;
use App\Services\News\NewsServices;
use App\Actions\News\NewsAction;

class BaseController extends Controller
{
    public NewsServices $service;
    public NewsAction $action;
    public NewsRepository $newsRepository;

    public function __construct(NewsServices $service, NewsAction $action, NewsRepository $newsRepository)
    {
        $this->service = $service;
        $this->action = $action;
        $this->newsRepository = $newsRepository;
    }
}
