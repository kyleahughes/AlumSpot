<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use AlumSpot\Event;
use AlumSpot\Comment;
use AlumSpot\Activity;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Http\Controllers\Controller;
use Carbon\Carbon;

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
        //retrieve all events ordered by earliest created_at column
        $event = Event::where('programs_id', '=', Auth::user()->programs_id)->orderBy('datetime', 'desc')->get();
        
        //pass the event instance through to the view
        return view('Coach/events/index', compact('event'));
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
