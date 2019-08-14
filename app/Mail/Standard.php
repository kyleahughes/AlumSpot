<?php

namespace AlumSpot\Mail;

use Illuminate\Bus\Queueable;
use Illuminate\Mail\Mailable;
use Illuminate\Queue\SerializesModels;
use Illuminate\Contracts\Queue\ShouldQueue;
use AlumSpot\User;
use AlumSpot\Email;
use Illuminate\Support\Facades\Auth;

class Standard extends Mailable
{
    use Queueable, SerializesModels;

    //pass in the coach instance
    public $user;
    public $email;
    
    /**
     * Create a new message instance.
     *
     * @return void
     */
    public function __construct(User $user, Email $email)
    {
        $this->user = $user;
        $this->email = $email;
    }
    
    /**
     * Build the message.
     *
     * @return $this
     */
    public function build()
    {
        $coachEmail = Auth::user()->email;
        
        return $this->from($coachEmail)->
                subject($this->email->subject)->
                markdown('Emails.standard');
    }
}
