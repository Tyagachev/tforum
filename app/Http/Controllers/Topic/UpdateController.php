<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Http\Requests\Topic\TopicUpdateRequest;
use Illuminate\Http\RedirectResponse;

class UpdateController extends BaseController
{
    /**
     * Обновление топика
     * @param TopicUpdateRequest $request
     * @return \Illuminate\Http\RedirectResponse
     */
    public function __invoke(TopicUpdateRequest $request): RedirectResponse
    {
        $topicValidate = $request->validated();

        $topicIsUpdated = $this->service->update($topicValidate);

        if ($topicIsUpdated) {
            return redirect()->route('show.topic', [$topicValidate['id']])->with('success', 'Данные успешно обновлены');
        }
        return redirect()->back()->with('error', 'Произошла ошибка обновления данных');
    }
}
