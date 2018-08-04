<?php

namespace App\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use App\Model\MailTemplate;

class RegisterSuccess extends Mailable
{
    use Queueable, SerializesModels;
    public $user;
    public $password;
    public function __construct($user,$password)
    {
        $this->user = $user;
        $this->password = $password;
    }
    public function build()
    {
        $mail = mailTemplate::where('key','register-success')->first();
        return $this->view('admin.pages.mail.register.mail',['mail'=>$mail])->subject($mail->title);
    }
}
