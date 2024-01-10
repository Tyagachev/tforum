<?php

namespace App\Http\Controllers\Topic;

use App\Http\Requests\Topic\TopicDestroyRequest;
use Illuminate\Http\RedirectResponse;

class DestroyController extends BaseController
{
    /**
     * Удаление топика
     *
     * @param TopicDestroyRequest $request
     * @return RedirectResponse
     */
    public function __invoke(TopicDestroyRequest $request): RedirectResponse
    {
        $topic = $request->validated();
        $topicIsDestroy = $this->service->delete($topic);

        if ($topicIsDestroy) {
            return redirect()->route('show.theme', $topic['theme_id'])->with('success', 'Тема успешно удалена');
        }
        return redirect()->back()->with('error', 'Не удалось удалить тему');
    }
}
