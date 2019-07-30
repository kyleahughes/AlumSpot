<?php

namespace AlumSpotDev\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use AlumSpotDev\User;

class WelcomeCoach extends Mailable
{
    use Queueable, SerializesModels;

    //any public property passed here will be vailable to the view
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
        return $this->markdown('Emails.welcomeCoach');
    }
}
