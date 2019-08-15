<?php

namespace AlumSpot\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use AlumSpot\Event;
use AlumSpot\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use AlumSpot\RSVPEvent;
use AlumSpot\Program;
use AlumSpot\User;

class EventController extends Controller
{
    
    /**
     * Middleware redirect guard for alumni pages.
     * Need to be registered as an alumni
     * to use any of these routes. i.e alumni guard
     */
    public function __construct() 
    { 
        $this->middleware('auth:alumni');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all events ordered by earliest created_at column
        $event = Event::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->orderBy('datetime', 'desc')->get();
        $rsvpEvent = RSVPEvent::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->get();
        
        //pass the event instance through to the view
        return view('Alumni/events/index', compact('event', 'rsvpEvent'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('Alumni/events/create');
    }

    /**
     * lets alumni RSVP to Event
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Event $event)
    {
        //receive program id and user id
        $program_id = Program::where('id', '=', Auth::guard('alumni')->user()->programs_id)->value('id');
        $user_id = User::where('programs_id', '=', $program_id)->value('id');
        
        //create and save the rsvp event
        RSVPEvent::create([
            'users_id' => $user_id, 
            'programs_id' =>  $program_id,
            'events_id' => $event->id, 
            'alumnis_id' => Auth::guard('alumni')->user()->id, 
        ]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('Alumni/events/individual', compact('event'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
