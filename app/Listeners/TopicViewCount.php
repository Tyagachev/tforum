<?php

namespace App\Listeners;

use App\Events\TopicHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class TopicViewCount
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     */
    public function handle(TopicHasViewed $event): void
    {
        $event->topicView->increment('view_count');
    }
}
