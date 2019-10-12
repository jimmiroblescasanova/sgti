<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class SendComments extends Mailable
{
    public $subject = 'Mensaje recibido';
    public $msg;

    use Queueable, SerializesModels;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    public function build()
    {
        return $this->markdown('emails.message-received');
    }
}
