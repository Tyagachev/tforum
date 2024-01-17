<?php

namespace App\Http\Controllers\Topic;

use App\Models\Topic;
use Illuminate\View\View;

class EditController extends BaseController
{
    /**
     * Страница редактирования топика
     *
     * @param Topic $topic
     * @return \Illuminate\View\View
     */
    public function __invoke(Topic $topic): View
    {
        $editTopic = $this->topicRepository->getOneObj($topic->id);
        return view('pages.topic.edit',[$topic], compact('editTopic'));
    }
}
