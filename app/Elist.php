<?php

namespace AlumSpot;

use Illuminate\Database\Eloquent\Model;

class Elist extends Model
{
    //fillable = the fields we are allowing to be passed through the events form 
    //guarded = the fields we are not allowing to be passed through the form
    protected $fillable = ['emails', 'users_id', 'programs_id', 'group'];
    
    //makes event belong to a coach
    public function coach() {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    //makes event belong to a coach
    public function program() {
        return $this->belongsTo(Program::class, 'programs_id');
    }
    
}
