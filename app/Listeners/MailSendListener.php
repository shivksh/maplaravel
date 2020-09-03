<?php

namespace App\Listeners;

use App\Events\MailSendEvent;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Support\Facades\Mail;
use App\Mail\WelcomeEmail;



class MailSendListener implements ShouldQueue
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
     * @param  MailSendEvent  $event
     * @return void
     */
    public function handle(MailSendEvent $event)
    {
        sleep(5);
        Mail::to($event->user)->send(new WelcomeEmail());
    }
}
