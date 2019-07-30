<?php

namespace AlumSpotDev;

use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    //fillable for these values only
    protected $fillable = ['body', 'users_id', 'alumnis_id', 'programs_id', 'events_id'];

    public function alumni() {
        return $this->belongsTo(Alumni::class, 'alumnis_id');
    }
    
    public function coach() {
        return $this->belongsTo(User::class, 'users_id');
    }
    
    public function event() {
        return $this->belongsTo(Event::class, 'events_id');
    }

}
