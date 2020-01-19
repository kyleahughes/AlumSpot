<?php

namespace AlumSpot\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use AlumSpot\Event;
use AlumSpot\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use AlumSpot\RSVPEvent;
use AlumSpot\Program;
use AlumSpot\User;
use Calendar;
use Carbon;

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
        $eventArray = [];
        //retrieve all events ordered by earliest created_at column
        $mytime = Carbon\Carbon::now()->toDateTimeString();
        $event = Event::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->orderBy('datetime', 'asc')->get();
        $upcomingEvent = Event::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->where('datetime', '>=', $mytime)->orderBy('datetime', 'asc')->paginate(4);
        $pastEvent = Event::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->where('datetime', '<', $mytime)->orderBy('datetime', 'desc')->paginate(4);
        $rsvpEvent = RSVPEvent::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->get();
        
        if($event->count()) {
            foreach ($event as $key => $value) {
                $eventArray[] = Calendar::event(
                    $value->title,
                    true,
                    new \DateTime($value->datetime),
                    new \DateTime($value->datetime.' +1 day'),
                    null,
                    // Add color and link on event
	                [
	                    'color' => '#f05050',
                            'url' => '/alumni/event/' . $value->id,
	                ]
                );
            }
        }
        
        $calendar = Calendar::addEvents($eventArray);
        
        $user = Auth::guard('alumni')->user();
        $user->unreadNotifications->markAsRead();
        
        //pass the event instance through to the view
        return view('Alumni/events/index', compact('event', 'calendar', 'rsvpEvent', 'upcomingEvent', 'pastEvent'));
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
        $rsvpEvent = RSVPEvent::where('events_id', '=', $event->id)->get();
        
        return view('Alumni/events/show', compact('event', 'rsvpEvent'));
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
