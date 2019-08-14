<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Http\Controllers\Controller;
use AlumSpot\Alumni;
use AlumSpot\Elist;
use Illuminate\Support\Facades\Session;

class ElistController extends Controller
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
        $alumni = Alumni::where('programs_id', '=', Auth::user()->programs_id)->get();
        $elist = Elist::where('programs_id', '=', Auth::user()->programs_id)->get();
        
        return view('Coach.emails.editlist', compact('alumni', 'elist'));
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

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //take textarea of emails and create an array
        $emailer = explode(", ", $request->input('emails'));
        
        $request->validate([
            'emails' => 'email_array',
        ]);
        
        foreach($emailer as $emails) {
            Elist::create([
                'users_id' => Auth::user()->id, 
                'programs_id' => Auth::user()->programs_id,
                'emails' => $emails, 
                'group' => request('group'),
            ]);   
        }
        
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
    public function destroy($id)
    {
        Elist::where('id', '=', $id)->delete();
        
        return back();
    }
}
