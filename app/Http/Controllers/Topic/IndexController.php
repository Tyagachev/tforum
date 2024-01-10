<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Topic;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Страница сообщества
     *
     * @return View
     */
    public function __invoke(): View
    {
        $allTopics = $this->topicRepository->getAll();

        return view('pages.topic.index', compact('allTopics'));
    }
}
