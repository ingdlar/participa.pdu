<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class SendPwdMailable extends Mailable
{
    use Queueable, SerializesModels;

    public $subject = "Bienvenido! Aqui podra encontrar su conseña";
    public $formattedPwd;
    public $name;
    public $lastname;
    public $card;
    public $email;
    public $rol_id;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct($formattedPwd, array $input)
    {
        $this->formattedPwd = $formattedPwd;
        $this->name = $input['name'];
        $this->lastname = $input['lastname'];
        $this->card = $input['card'];
        $this->email = $input['email'];
        $this->rol_id = $input['rol'];
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.sendpwd');
    }
}
