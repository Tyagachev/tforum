<?php

namespace App\Http\Controllers\Admin\CommentList;

use App\Http\Controllers\Controller;
use App\Services\CommentList\WordCheckService;

class BaseController extends Controller
{
    public WordCheckService $commentListService;
    public function __construct(WordCheckService $commentListService)
    {
        $this->commentListService = $commentListService;
    }
}
