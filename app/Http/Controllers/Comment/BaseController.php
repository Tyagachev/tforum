<?php

namespace App\Http\Controllers\Comment;

use App\Http\Controllers\Controller;
use App\Services\Comment\CommentService;

class BaseController extends Controller
{
    public CommentService $service;

    public function __construct(CommentService $service)
    {
        $this->service = $service;
    }
}
