<?php

namespace AlumSpotDev\Http\Controllers\Coach;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AlumSpotDev\Http\Controllers\Controller;
use AlumSpotDev\Alumni;
use AlumSpotDev\Elist;

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
        //validate the form
        $this->validate(request(), [
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);

        //create and save the coach
        $user = User::create([
            'schools_id' => $school->id, 
            'programs_id' => $program->id, 
            'first_name' => request('first_name'), 
            'last_name' => request('last_name'), 
            'email' => request('email'), 
            'password' => bcrypt(request('password'))
        ]); 
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
        //
    }
}
