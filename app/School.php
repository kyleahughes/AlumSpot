<?php

namespace AlumSpotDev;

use Illuminate\Database\Eloquent\Model;

class School extends Model
{
    protected $fillable = ['name'];
    
    //links schools to many coaches
    public function coach(){
        return $this->hasMany(User::class, 'schools_id');
    }    

    //links schools to many teams
    public function program(){
        return $this->hasMany(Program::class, 'schools_id');
    }
    
    //links schools to many alumni
    public function alumni(){
        return $this->hasMany(Alumni::class, 'schools_id');
    }
}
