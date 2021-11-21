<?php

namespace App\Listeners;

use App\Events\newUserEvent;
use App\Mail\userMail;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;

class newUserListener
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
     * @param  object  $event
     * @return void
     */
    public function handle(newUserEvent $event)
    {
        DB::table('newsletter')->insert([
            'email' => $event->email
        ]);

        Mail::to($event->email)->send(new userMail());
    }
}
