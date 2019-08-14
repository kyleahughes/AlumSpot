<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use AlumSpot\Email;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Alumni;
use Illuminate\Support\Facades\Mail;
use AlumSpot\Mail\Standard;
use AlumSpot\Http\Controllers\Controller;
use AlumSpot\Activity;
use AlumSpot\Elist;

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
        //retrieve all emails to be listed
        $emails = Email::where('users_id', '=', Auth::user()->id)->orderBy('created_at', 'desc')->get();
        //show all alumni
        $alumni = Alumni::where('programs_id', '=', Auth::user()->programs_id)->get();
        //show all additional emails
        $elist = Elist::where('programs_id', '=', Auth::user()->programs_id)->get();
        
        //group all alumni emails from additional list and registered users
        $alumnireg = Alumni::where('programs_id', '=', Auth::user()->programs_id)->get();
        $alumnielist = Elist::where('programs_id', '=', Auth::user()->programs_id)->where('group', '=', 'Alumni')->get();
        $alumfull = $alumnireg->merge($alumnielist);
        //retrieve all emails from additional list that are not alumni or registered users
        $acquaintances = Elist::where('programs_id', '=', Auth::user()->programs_id)->where('group', '=', 'Acquaintance')->get();
        
        return view('Coach.emails.index', compact('emails', 'alumni', 'elist', 'alumfull', 'acquaintances'));
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
    public function store(Request $request)
    {
        //validation for the events
        $this->validate(request(), [
            'subject' => 'required|min:3',
            'body' => 'required',
            'recipient' => 'required'
        ]);
        
        //create and save the event with these established fields
        $email = Email::create([
            'subject' => request('subject'), 
            'body' => request('body'),
            'recipient' => request('recipient'), 
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
        
        //group all alumni recipients
        $alumnireg = Alumni::where('programs_id', '=', $programsid)->pluck('email');
        $alumnielist = Elist::where('programs_id', '=', $programsid)->where('group', '=', 'Alumni')->pluck('emails');
        $alumni = $alumnireg->merge($alumnielist);
        //recipient collection decleration for acq. and all recip
        $acquaintances = Elist::where('programs_id', '=', $programsid)->where('group', '=', 'Acquaintance')->pluck('emails');
        $all = $alumni->merge($acquaintances);
        
        
        //send email based on recipient input
        if($request->input('recipient') === 'All') {
            Mail::to($all)->send(new Standard($user, $email));
        }
        else if($request->input('recipient') === 'Alumni') {
            Mail::to($alumni)->send(new Standard($user, $email));
        }
        else if($request->input('recipient') === 'Acquaintances') {
            Mail::to($acquaintances)->send(new Standard($user, $email));
        }
        
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
