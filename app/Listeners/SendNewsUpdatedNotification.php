<?php

namespace App\Listeners;

use App\Events\NewsUpdated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewsUpdatedNotification
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  NewsUpdated  $event
     * @return void
     */
    public function handle(NewsUpdated $event)
    {
        Mail::to(env('MAIL_ADMIN', 'admin@example.com'))->send(new \App\Mail\NewsUpdated($event->news));
    }
}
