<?php

namespace AlumSpot;

use Illuminate\Database\Eloquent\Model;

class Program extends Model
{
    protected $fillable = ['school', 'type', 'sport', 'schools_id'];
    
    //links program to many coaches
    public function coach(){
        return $this->hasMany(User::class, 'programs_id');
    }    

    //links program to many schools
    public function school(){
        return $this->belongsTo(School::class, 'schools_id');
    }
    
    //links program to many alumni
    public function alumni(){
        return $this->hasMany(Alumni::class, 'programs_id');
    }
    
    //links program to many events
    public function event(){
        return $this->hasMany(Event::class, 'programs_id');
    }
    
    //links program to many emails
    public function email(){
        return $this->hasMany(Email::class, 'programs_id');
    }
    
    //links program to many comments
    public function comment(){
        return $this->hasMany(Comment::class, 'programs_id');
    }
    
    //links program to many Elists
    public function elist(){
        return $this->hasMany(Comment::class, 'programs_id');
    }
}
