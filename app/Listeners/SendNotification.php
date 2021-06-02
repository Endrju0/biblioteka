<?php

namespace App\Listeners;

use App\Events\BookCreated;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Mail\BookCreated as BookCreatedMail;

class SendNotification
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
     * @param  BookCreated  $event
     * @return void
     */
    public function handle(BookCreated $event)
    {
        Mail::to('yobamib606@pidhoes.com')->send(new BookCreatedMail($event->book));
        Log::info('Email powinien wysłany! Książka ' . $event->book->name . ' została dodana!');
    }
}
