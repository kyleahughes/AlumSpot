<?php

namespace AlumSpot;

use Illuminate\Database\Eloquent\Model;

class Email extends Model
{
    //fillable for these values only
    protected $fillable = ['body', 'subject', 'recipient', 'users_id', 'alumnis_id', 'programs_id'];
    
    public function coach() {
        $this->belongsTo(User::class, 'users_id');
    }
    
    public function alumni() {
        return $this->hasMany(Alumni::class, 'alumnis_id');
    }
    
    public function program() {
        return $this->belongsTo(Program::class, 'programs_id');
    }
}
