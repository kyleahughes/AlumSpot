<?php

namespace AlumSpotDev;

use Illuminate\Database\Eloquent\Model;

class Activity extends Model
{
    //fillable values
    protected $fillable = ['events_id', 'programs_id', 'emails_id', 'users_id', 'alumnis_id'];
    
    //links to many events
    public function event(){
        return $this->belongsTo(Event::class, 'events_id');
    }
    
    
    //links to many emails
    public function email(){
        return $this->belongsTo(Email::class, 'emails_id');
    }
    
    //links to a program
    public function program(){
        return $this->belongsTo(Program::class, 'programs_id');
    }
    
    //links to a user
    public function coach(){
        return $this->belongsTo(User::class, 'users_id');
    }
    
    //links to a user
    public function alumni(){
        return $this->belongsTo(Alumni::class, 'alumnis_id');
    }
    
}
