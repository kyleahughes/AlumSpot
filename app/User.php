<?php

namespace AlumSpotDev;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'first_name', 'last_name', 'email', 'password', 'schools_id', 'programs_id'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];
    
    //makes coach belong to a school
    public function school() {
        return $this->belongsTo(School::class, 'schools_id');
    }
    
    //makes coach belong to a program
    public function program() {
        return $this->belongsTo(Program::class, 'programs_id');
    }
}
