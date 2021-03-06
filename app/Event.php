<?php

namespace AlumSpot;

use Illuminate\Database\Eloquent\Model;
use AlumSpot\User;

class Event extends Model
{
    //fillable = the fields we are allowing to be passed through the events form 
    //guarded = the fields we are not allowing to be passed through the form
    protected $fillable = ['title', 'body', 'datetime', 'location', 'users_id', 'programs_id'];
    
    //makes event belong to a coach
    public function coach() {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    //makes event belong to a coach
    public function program() {
        return $this->belongsTo(Program::class);
    }
    
    public function comment() {
        return $this->hasMany(Comment::class, 'events_id');
    }
    
    public function rsvpEvent() {
        return $this->hasMany(RSVPEvent::class, 'events_id');
    }
    
}
