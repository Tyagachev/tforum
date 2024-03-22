<?php

namespace App\Http\Controllers\API\Liked;

use App\Http\Controllers\Controller;
use App\Models\Comment;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LikedController extends BaseController
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request)
    {
        $hasLike = Like::query()
            ->where('user_id', '=', $request['user_id'])
            ->where('likeable_id', '=', $request['likeable_id'])
            ->where('likeable_type', '=', 'App\Models\Comment')
            ->first();
        if ($hasLike) {
            $deleteLike = $this->likedService->delete($hasLike);
            return response()->json($deleteLike);
        }
        $createdLike = $this->likedService->save($request);

        return response()->json($createdLike);
    }
}
