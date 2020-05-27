<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class CredentialMail extends Mailable
{
    use Queueable, SerializesModels;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public $view;
    public $title;
    public $email;
    public $name;
    public $password;
    public function __construct($name,$email,$password,$view,$title)
    {
        $this->email=$email;
        $this->name=$name;
        $this->password=$password;
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
        ->view('mail.'.$this->view)->with([
            'name'=>$this->name,
            'email'=>$this->email,
            'password'=>$this->password,
            'title'=>$this->title,
            ]);
    }
}
