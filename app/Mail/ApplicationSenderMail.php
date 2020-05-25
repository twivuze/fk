<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class ApplicationSenderMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $aplication;
    public $view;
    public $title;
    public function __construct($aplication,$view,$title="New All Trust Mail")
    {
        $this->aplication=$aplication;
        $this->view=$view;
        $this->title=$title;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return 
        $this->from(env('MAIL_FROM'))
        ->subject($this->title)
        ->view('mail.'.$this->view)->with(['aplication'=>$this->aplication]);
    }
}
