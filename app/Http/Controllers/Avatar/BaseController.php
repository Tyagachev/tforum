<?php

namespace App\Http\Controllers\Avatar;

use App\Actions\Avatar\AvatarAction;
use App\Http\Controllers\Controller;
use App\Services\Avatar\AvatarService;

class BaseController extends Controller
{
    public AvatarAction $avatarAction;
    public AvatarService $avatarService;

    public function __construct(AvatarAction $avatarAction, AvatarService $avatarService)
    {
        $this->avatarAction = $avatarAction;
        $this->avatarService = $avatarService;
    }
}
