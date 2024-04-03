<?php

namespace App\Http\Controllers\API\Liked;

use App\Http\Controllers\Controller;
use App\Models\Like;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;

class ShowController extends Controller
{
    /**
     * Получаем актуальное
     * количество лайков для комментария
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
    {
        $getLikeCount = Like::query()
            ->where('likeable_id', '=', $request['comment_id'])->get()->count();
        return response()->json($getLikeCount);
    }
}
