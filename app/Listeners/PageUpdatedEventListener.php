<?php

namespace App\Listeners;

use App\Events\PageUpdatedEvent;
use Illuminate\Support\Facades\Cache;

class PageUpdatedEventListener
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
    public function handle(PageUpdatedEvent $event): void
    {
        Cache::forget('page_'.$event->page->id);
    }
}
