<?php

namespace AlumSpotDev\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use AlumSpotDev\Alumni;

class WelcomeAlumni extends Mailable
{
    use Queueable, SerializesModels;

    //pass in the alumni value to the view
    public $alumni;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(Alumni $alumni)
    {
        $this->alumni = $alumni;
    }

    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        return $this->markdown('emails.welcomeAlumni');
    }
}
