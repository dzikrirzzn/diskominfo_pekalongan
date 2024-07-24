<?php

namespace App\Listeners;

use App\Events\PageVisited;
use App\Models\PageVisit;

class LogPageVisit
{
    public function handle(PageVisited $event): void
    {
        PageVisit::create([
            'url' => $event->url,
            'ip_address' => $event->ipAddress,
            'visited_at' => now(),
        ]);
    }
}