<?php

namespace App\Http\Controllers\Admin\CommentList;

use Illuminate\Http\Request;

class IndexController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        return view('pages.admin.commentList.index');
    }
}
