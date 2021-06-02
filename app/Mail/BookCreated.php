<?php

namespace App\Mail;

use App\Models\Book;
use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class BookCreated extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Book instance
     * 
     * @var Book
     */
    public $book;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Book $book)
    {
        $this->book = $book;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->from('admin@biblioteka')
                    ->subject('Nowa książka')
                    ->view('mails.bookcreated')
                    ->with([
                        'bookTitle' => $this->book->name
                    ]);
    }
}
