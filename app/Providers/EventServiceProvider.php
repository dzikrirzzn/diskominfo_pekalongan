<?php

namespace App\Providers;

use Illuminate\Foundation\Support\Providers\EventServiceProvider as ServiceProvider;
use Illuminate\Support\Facades\Event;
use App\Events\PageVisited;
use App\Listeners\LogPageVisit;

class EventServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        Event::listen(
            PageVisited::class,
            [LogPageVisit::class, 'handle']
        );
    }
}