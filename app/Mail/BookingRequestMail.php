<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class BookingRequestMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $aplication;
    public $title;

    public function __construct($aplication,$title="Booking Request Submitted!")
    {
        $this->aplication=$aplication;
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $this->from(env('MAIL_FROM'))
        ->subject($this->title)
        ->view('mail.booking')->with(['aplication'=>$this->aplication]);
    }
}
