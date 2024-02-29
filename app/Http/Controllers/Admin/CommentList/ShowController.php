<?php

namespace App\Http\Controllers\Admin\CommentList;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\View\View;

class ShowController extends BaseController
{
    /**
     * Выполнение поиска подозрительных комментов
     *
     * @param Request $request
     * @return View
     */
    public function __invoke(Request $request): View
    {
        $dateTime = $request->input();
        $this->commentsSuspectArray = $this->commentListService->searchCommentsToWords($dateTime);

        return view('pages.admin.commentList.index', ['commentsSuspectArray' => $this->commentsSuspectArray]);
    }
}
