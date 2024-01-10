<?php

namespace App\Http\Controllers\Topic;

use App\Http\Requests\Topic\TopicStoreRequest;
use Illuminate\Http\RedirectResponse;

class StoreController extends BaseController
{
    /**
     * Запись топика в БД
     *
     * @param TopicStoreRequest $request
     * @return RedirectResponse
     */
    public function __invoke(TopicStoreRequest $request): RedirectResponse
    {
        $topicData = $request->validated();

        $storeTopic = $this->service->save($topicData);

        if ($storeTopic) {
            return redirect()->route('show.theme', [$topicData['theme_id']])->with('success', 'Тема сознана');
        }
        return  redirect()->back()->with('error', 'Произошла ошибка при сохранении темы');
    }
}
