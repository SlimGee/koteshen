<?php

namespace App\Listeners;

use Illuminate\Auth\Events\Registered;
use Illuminate\Contracts\Queue\ShouldQueue;
use MailerLite\MailerLite;

class Subscribe implements ShouldQueue
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
    public function handle(Registered $event): void
    {
        $mailerLite = app(MailerLite::class);

        $mailerLite->subscribers->create([
            'email' => $event->user->email,
            'fields' => [
                'name' => $event->user->name,
            ],
        ]);
    }
}
