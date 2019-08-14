<?php

namespace AlumSpot\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use AlumSpot\Fundraiser;
use AlumSpot\Event;
use AlumSpot\Comment;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Http\Controllers\Controller;


class CommentsController extends Controller
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function storeFundraiser(Fundraiser $fundraiser)
    {
        //create and save the comment to the specific challenge
        Comment::create([
            'fundraisers_id' => $fundraiser->id,
            'programs_id' => Auth::guard('alumni')->user()->program->id,
            'alumnis_id' => Auth::guard('alumni')->user()->id
        ]);
        
        return back();
    }
    
    public function storeEvent(Event $event)
    {

        //create and save the comment to the specific Event
        Comment::create([
            'body' => request('body'),
            'events_id' => $event->id,
            'programs_id' => Auth::guard('alumni')->user()->program->id,
            'alumnis_id' => Auth::guard('alumni')->user()->id
        ]);
        
        return back();
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Challenges $challenge)
    {
        
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
        Comment::where('id', '=', $id)->delete();
        
        return back();
    }
}