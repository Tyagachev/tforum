<?php

namespace App\Http\Controllers\Admin\CommentList;

use Illuminate\View\View;

class IndexController extends BaseController
{
    /**
     * Страница вывода фильтра комментариев
     *
     * @return View
     */
    public function __invoke(): View
    {
        $this->commentsSuspectArray = [];
        return view('pages.admin.commentList.index', ['commentsSuspectArray' => $this->commentsSuspectArray]);
    }
}
