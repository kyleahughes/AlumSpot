<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use AlumSpot\Event;
use AlumSpot\Comment;
use AlumSpot\Activity;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Http\Controllers\Controller;
use Calendar;
use AlumSpot\RSVPEvent;
use Carbon;

class EventController extends Controller
{
    
    /**
     * Middleware redirect guard for coach pages.
     * Need to be registered as an coach any of 
     * these routes. i.e default (users) guard
     */
    public function __construct() 
    {        
        $this->middleware('auth');
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
        $event = Event::where('programs_id', '=', Auth::user()->programs_id)->orderBy('datetime', 'asc')->get();
        $upcomingEvent = Event::where('programs_id', '=', Auth::user()->programs_id)->where('datetime', '>=', $mytime)->orderBy('datetime', 'asc')->get();
        $rsvpEvent = RSVPEvent::where('programs_id', '=', Auth::user()->programs_id)->get();
        
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
	                    'url' => '/coach/event/view',
	                ]
                );
            }
        }
        
        $calendar = Calendar::addEvents($eventArray);
        
        //pass the event instance through to the view
        return view('Coach/events/index', compact('event', 'calendar', 'rsvpEvent', 'upcomingEvent'));
    }


    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //validation for the events
        $this->validate(request(), [
            'title' => 'required|min:3',
            'body' => 'required|max:300',
            'datetime' => 'required',
            'location' => 'required'
        ]);
        
        //create and save the event with these established fields
        $event = Event::create([
            'title' => request('title'), 
            'body' => request('body'), 
            'datetime' => request('datetime'),
            'location' => request('location'),
            'users_id' => auth()->id(),
            'programs_id' => Auth::user()->programs_id,
        ]);
        
        Activity::create([
            'events_id' => $event->id,
            'programs_id' => Auth::user()->programs_id,
            'users_id' => Auth::user()->id
        ]);
        
        return redirect('/coach/event/view');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Event $event)
    {
        return view('Coach/events/individual', compact('event'));
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
    public function delete($id)
    {
        //Delete event and all comments associated with it
        Event::where('id', '=', $id)->delete();
        Comment::where('events_id', '=', $id)->delete();
        Activity::where('events_id', '=', $id)->delete();
        
        return back();
    }
}
