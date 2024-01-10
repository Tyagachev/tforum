<?php

namespace App\Http\Controllers\Admin\UserList;

use App\Http\Controllers\Controller;
use App\Http\Requests\User\UserDestroyRequest;
use Illuminate\Http\Request;

class DestroyController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UserDestroyRequest $request)
    {
        $userId = $request->validated();
        $this->service->delete($userId);
    }
}
