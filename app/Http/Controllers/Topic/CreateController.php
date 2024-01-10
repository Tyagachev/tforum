<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Models\Theme;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CreateController extends BaseController
{

    /**
     * Страница создания топика
     *
     * @return View
     */
    public function __invoke($id): View
    {
        return view('pages.topic.create', [$id], compact('id') );
    }
}
