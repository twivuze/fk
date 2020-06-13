<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class Repayment extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $id;
    public function __construct($id)
    {
        $this->id=$id;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $invoice = \App\Models\Repayment::find($this->id);
        return 
        $this->from(env('MAIL_FROM'))
        ->subject($invoice->status.' Invoice')
        ->view('mail.repayment-invoice')->with([
            'id'=>$this->id
            ]);
    }
}
