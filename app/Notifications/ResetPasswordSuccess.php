<?php

namespace App\Notifications;

use Illuminate\Bus\Queueable;
use Illuminate\Notifications\Notification;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Notifications\Messages\MailMessage;
use Illuminate\Auth\Notifications\ResetPassword as ResetPasswordNotification;
use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Mail;
use App\Notifications\ResetPassword;
use Illuminate\Mail\Message;
use App\Model\MailTemplate;
class ResetPasswordSuccess extends ResetPasswordNotification
{
    use Queueable;
    public $token;
    public function __construct($token)
    {
        $this->token = $token;
        $email = MailTemplate::where('key','forgotpassword-user-success')->get();
        view()->share('email',$email);
        view()->share('token',$token);
    }
    public function via($notifiable)
    {
        return ['mail'];
    }
    public function toMail($notifiable)
    {
        $value = MailTemplate::where('key','forgotpassword-user-success')->first();
        return (new MailMessage)->view('admin.pages.mail.resetpassword.mail')->subject($value->title);
    }
}
