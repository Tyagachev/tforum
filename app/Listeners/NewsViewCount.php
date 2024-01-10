<?php

namespace App\Listeners;

use App\Events\NewsHasViewed;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;

class NewsViewCount
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
    public function handle(NewsHasViewed $event): void
    {
        $event->newsView->increment('view_count');
    }
}
