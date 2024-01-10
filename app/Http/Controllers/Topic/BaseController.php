<?php

namespace App\Http\Controllers\Topic;

use App\Http\Controllers\Controller;
use App\Repository\CommentRepository;
use App\Repository\TopicRepository;
use App\Services\Topic\TopicService;

class BaseController extends Controller
{
    public TopicService $service;
    public TopicRepository $topicRepository;
    public CommentRepository $commentRepository;

    public function __construct(TopicService $service,
                                TopicRepository $topicRepository,
                                CommentRepository $commentRepository)
    {
        $this->service = $service;
        $this->topicRepository = $topicRepository;
        $this->commentRepository = $commentRepository;
    }
}
