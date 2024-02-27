<?php

namespace App\Http\Controllers\Admin\WordCheck;

use App\Http\Controllers\Controller;
use App\Services\WordCheck\WordCheckService;

class BaseController extends Controller
{
    public WordCheckService $wordService;
    public function __construct(WordCheckService $wordService)
    {
        $this->wordService = $wordService;
    }
}
