<?php

namespace App\Listeners;

use App\Events\PostCreated;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Mail\Mailables\Address;
use Illuminate\Support\Facades\Mail;
use App\Models\User;

class NotifySubscribers implements ShouldQueue
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
    public function handle(PostCreated $event): void
    {
        $subscribers = $event->post->user->subscribers;

        foreach ($subscribers as $subscriber) {
            Mail::to($subscriber->email)->send(new \App\Mail\PostCreatedMail($event->post));
        }
    }
}
