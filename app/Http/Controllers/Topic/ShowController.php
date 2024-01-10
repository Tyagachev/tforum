<?php

namespace App\Http\Controllers\Topic;

use App\Models\Topic;
use Illuminate\View\View;
use App\Events\TopicHasViewed;

class ShowController extends BaseController
{
    /**
     * Просмотр топика
     *
     * @param Topic $topic
     * @return View
     */
    public function __invoke(Topic $topic): View
    {
        $topicObject = $this->topicRepository->getOneObj($topic->id);
        event(new TopicHasViewed($topic));
        return view('pages.topic.show',[$topic],
            compact('topicObject'));
    }
}
