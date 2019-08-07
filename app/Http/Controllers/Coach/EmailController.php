<?php

namespace AlumSpotDev\Http\Controllers\Coach;

use Illuminate\Http\Request;
use AlumSpotDev\Email;
use Illuminate\Support\Facades\Auth;
use AlumSpotDev\Alumni;
use Illuminate\Support\Facades\Mail;
use AlumSpotDev\Mail\Standard;
use AlumSpotDev\Http\Controllers\Controller;
use AlumSpotDev\Activity;

class EmailController extends Controller
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
        $emails = Email::where('users_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        $alumni = Alumni::where('programs_id', '=', Auth::user()->programs_id)->get();
        
        return view('Coach.emails.index', compact('emails', 'alumni'));
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
    public function store()
    {
        //validation for the events
        $this->validate(request(), [
            'subject' => 'required|min:3',
            'body' => 'required|max:300',
        ]);
        
        //create and save the event with these established fields
        $email = Email::create([
            'subject' => request('subject'), 
            'body' => request('body'), 
            'users_id' => Auth::user()->id,
            'programs_id' => Auth::user()->programs_id,
        ]);
        
        //store it as an activity
        Activity::create([
            'emails_id' => $email->id,
            'programs_id' => Auth::user()->programs_id,
            'users_id' => Auth::user()->id
        ]);
        
        $programsid = Auth::user()->programs_id;
        $user = Auth::user();
        $alumni = Alumni::where('programs_id', '=', $programsid)->pluck('email');
        
        //send email
        Mail::to($alumni)->send(new Standard($user, $email));
        
        
        return redirect('/coach/emailCenter');
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
    public function edit()
    {
        
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
