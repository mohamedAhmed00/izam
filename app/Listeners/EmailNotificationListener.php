<?php

namespace App\Listeners;

use App\Events\EmailNotification;
use Illuminate\Support\Facades\Mail;

class EmailNotificationListener
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * implement the mail logic
     */
    public function handle(EmailNotification $event): void
    {
        Mail::to(auth()->user())->send(new \App\Mail\EmailNotification());
    }
}
