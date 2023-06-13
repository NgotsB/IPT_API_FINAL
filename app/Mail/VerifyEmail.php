<?php

namespace App\Mail;

use App\Models\User;
use Illuminate\Bus\Queueable;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;

class VerifyEmail extends Mailable
{

    // use Queueable, SerializesModels;

    // public $verificationUrl;

    // public function __construct($verificationUrl)
    // {
    //     $this->verificationUrl = $verificationUrl;
    // }

    // public function build()
    // {
    //     return $this->view('emails.verify-email');
    // }




    use Queueable, SerializesModels;

    public $user;

    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user)
    {
        $this->user = $user;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->view('emails.verify-email')->with([
            'user' => $this->user,
            'verificationUrl' => $this->verificationUrl(),
        ]);
    }

    protected function verificationUrl()
    {
        return view('email-verified');
        // return URL::temporarySignedRoute(
        //     'verification.verify',
        //     now()->addMinutes(config('auth.verification.expire', 60)),
        //     ['id' => $this->user->getKey()]
        // );
    }
}
