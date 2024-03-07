<?php

namespace App\Http\Controllers\API\Liked;

use App\Http\Controllers\Controller;
use App\Services\Liked\LikedService;

class BaseController extends Controller
{
    protected $likedService;

    public function __construct(LikedService $likedService)
    {
        $this->likedService = $likedService;
    }
}
