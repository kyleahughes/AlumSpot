<?php

namespace AlumSpotDev\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AlumSpotDev\Alumni;
use AlumSpotDev\Program;
use AlumSpotDev\School;
use AlumSpotDev\Mail\WelcomeAlumni;
use Illuminate\Support\Facades\Mail;
use AlumSpotDev\Http\Controllers\Controller;
use Illuminate\Support\Facades\Session;

class RegistrationController extends Controller
{
    
    /**
     * Middleware redirect guard for alumni pages.
     * Need to be registered as an alumni
     * to use any of these routes. i.e alumni guard
     */
    public function __construct() 
    { 
        $this->middleware('guest');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve all schools
        $alumSchool = School::all();
        
        //retrieve all schools
        $string = file_get_contents("../storage/JSON/universities.json");
        $school = json_decode($string, true);
        sort($school);
        
        //retrieve all sports
        $sportsString = file_get_contents("../storage/JSON/sports.json");
        $sport = json_decode($sportsString, true);
        sort($sport);
        
        //pass the event instance through to the view
        return view('auth.register', compact('school', 'sport', 'alumSchool'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerAlum');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //find program to store its id in user table
        $program = Program::where('schools_id', '=' ,request('schools_id'))->where('type', '=', request('type'))->where('sport', '=', request('sport'))->first();
       
//        if($program === null) 
//         {
//            $noProgram = request('school');
//            Session::flash('message2', $noProgram);
//            return redirect()->back();
//         }
            if($program === null) {
                Session::flash('message2');
                return redirect()->back();
            }
         
         
         
        //validate the form
        $this->validate(request(), [
            //user validation fields
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|email',
            'password' => 'required|confirmed',
        ]);
        
        //create and save the alumni
        $alumni = Alumni::create([
            'schools_id' => request('schools_id'), 
            'programs_id' => $program->id, 
            'first_name' => request('first_name'), 
            'last_name' => request('last_name'), 
            'email' => request('email'), 
            'password' => bcrypt(request('password'))
        ]);
        
        //Auth helper function to log the user in
        Auth::guard('alumni')->login($alumni);
        
        //send welcome email
        Mail::to($alumni)->send(new WelcomeAlumni($alumni));
        
        // Redirect to home page
        return redirect('/alumni/profile');
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
    public function destroy()
    {
        Auth::guard('alumni')->logout();
        return redirect('/');
    }
}
