<?php

namespace AlumSpotDev\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use AlumSpotDev\Event;
use AlumSpotDev\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

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
        $event = Event::where('programs_id', '=', Auth::guard('alumni')->user()->programs_id)->orderBy('date', 'desc')->get();
        
        //pass the event instance through to the view
        return view('Alumni/events/index', compact('event'));
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
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        
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
