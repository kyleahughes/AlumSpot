<?php

namespace AlumSpot;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Alumni extends Authenticatable
{
    
    use Notifiable;
    
    //established guarded path for multi authentication named admin
    protected $guard = 'alumni';
    
        /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
         'schools_id', 'programs_id', 'first_name', 'last_name', 'email', 'password', 'gradYear', 'industry'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //makes alumni belong to a school
    public function school() {
        return $this->belongsTo(School::class, 'schools_id');
    }
    
    //makes coach belong to a school
    public function program() {
        return $this->belongsTo(Program::class, 'programs_id');
    }
    
    //links alumni to many events
    public function event(){
        return $this->hasMany(Event::class);
    }
    
    //links alumni to many comments
    public function comment(){
        return $this->hasMany(Comment::class);
    }
    
    //links alumni to many events
    public function rsvpEvent(){
        return $this->hasMany(RSVPEvent::class, 'alumnis_id');
    }
    
}
