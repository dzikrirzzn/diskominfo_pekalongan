<?php

namespace App\Events;

use Illuminate\Foundation\Events\Dispatchable;
use Illuminate\Queue\SerializesModels;

class PageVisited
{
    use Dispatchable, SerializesModels;

    public string $url;
    public string $ipAddress;

    public function __construct(string $url, string $ipAddress)
    {
        $this->url = $url;
        $this->ipAddress = $ipAddress;
    }
}