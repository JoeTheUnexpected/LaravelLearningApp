<?php

namespace App\Listeners;

use App\Events\NewsDeleted;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;

class SendNewsDeletedNotification
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
     * @param  NewsDeleted  $event
     * @return void
     */
    public function handle(NewsDeleted $event)
    {
        Mail::to(env('MAIL_ADMIN', 'admin@example.com'))->send(new \App\Mail\NewsDeleted($event->news));
    }
}
