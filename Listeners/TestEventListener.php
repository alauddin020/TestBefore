<?php

namespace App\Listeners;

use App\Events\TestEvent;
use App\Http\Controllers\TestController;
use Illuminate\Contracts\Queue\ShouldQueue;
class TestEventListener extends TestController implements ShouldQueue
{
    public function handle(TestEvent $event)
    {
        $this->pdf($event->user);
    }
}
