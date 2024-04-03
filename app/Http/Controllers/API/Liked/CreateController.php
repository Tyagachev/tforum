<?php

namespace App\Http\Controllers\API\Liked;

use App\Models\Like;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class CreateController extends BaseController
{
    /**
     * Добавляем или удаляем лайки
     *
     * Получаем id комментария и id юзера
     * Проверяем есть ли такая запись в таблице лайков
     * если нет то добавляем в таблицу
     * если есть то удаляем
     *
     * @param Request $request
     * @return JsonResponse
     */
    public function __invoke(Request $request): JsonResponse
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
