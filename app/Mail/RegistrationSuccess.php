<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;

class RegistrationSuccess extends Mailable
{
    public $subject = 'Registro confirmado';
    public $msg;

    use Queueable, SerializesModels;

    public function __construct($msg)
    {
        $this->msg = $msg;
    }

    public function build()
    {
        return $this->markdown('emails.registration-success');
    }
}
