<?php

namespace AlumSpotDev\Http\Controllers\Coach;

use Illuminate\Http\Request;
use AlumSpotDev\Event;
use AlumSpotDev\Comment;
use Illuminate\Support\Facades\Auth;
use AlumSpotDev\Http\Controllers\Controller;

class CommentsController extends Controller
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
        //
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    
    public function storeEvent(Event $event)
    {

        //create and save the comment to the specific Event
        Comment::create([
            'body' => request('body'),
            'events_id' => $event->id,
            'programs_id' => Auth::user()->program->id,
            'users_id' => Auth::user()->id
        ]);
        
        return back();
    }
    

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
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
