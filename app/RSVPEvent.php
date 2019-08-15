<?php

namespace AlumSpot;

use Illuminate\Database\Eloquent\Model;

class RSVPEvent extends Model
{
    protected $fillable = ['programs_id', 'users_id', 'events_id', 'alumnis_id'];
    
    public function program() {
        return $this->belongsTo(Program::class, 'programs_id');
    }
    public function user() {
        return $this->belongsTo(User::class, 'users_id');
    }
    public function event() {
        return $this->belongsTo(Event::class, 'events_id');
    }
    public function alumni() {
        return $this->belongsTo(Alumni::class, 'alumnis_id');
    }
}
