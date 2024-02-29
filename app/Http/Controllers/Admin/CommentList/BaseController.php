<?php

namespace App\Http\Controllers\Admin\CommentList;

use App\Http\Controllers\Controller;
use App\Services\CommentList\CommentListService;

class BaseController extends Controller
{
    public CommentListService $commentListService;
    protected array|null $commentsSuspectArray;
    public function __construct(CommentListService $commentListService)
    {
        $this->commentListService = $commentListService;
    }
}
