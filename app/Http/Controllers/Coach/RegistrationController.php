<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use AlumSpot\User;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Mail\WelcomeCoach;
use Illuminate\Support\Facades\Mail;
use AlumSpot\Http\Controllers\Controller;
use AlumSpot\School;
use AlumSpot\Program;
use Illuminate\Support\Facades\Session;
use Stripe;

class RegistrationController extends Controller
{
    
    /**
     * Middleware redirect guard for coach pages.
     * Need to be registered as an coach any of 
     * these routes. i.e default (users) guard
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

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('registerTeam');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store()
    {
        //get all programs
        $program = Program::all();
        //loop through each program. if one matches the school, type and sport then return back with flash message
        foreach($program as $programs) {
            if(request('school') === $programs->school && request('type') === $programs->type && request('sport') === $programs->sport) {
                $attemptedProgram = request('school') . " " . request('type') . " " . request('sport');
                Session::flash('message', $attemptedProgram);
                return redirect()->back();
            }
        }
        //validate the form
        $this->validate(request(), [
            //user validation fields
            'first_name' => 'required',
            'last_name' => 'required',
            'email' => 'required|unique:users|email',
            'password' => 'required|confirmed',
            'school' => 'required',
            'sport' => 'required',
            'type' => 'required',
        ]);
        
        //create and save the school
        $school = School::firstOrCreate([
            'name' => request('school')
        ]);

        //create and save the program
        $programs = Program::create([
            'school' => request('school'),
            'sport' => request('sport'),
            'type' => request('type'),
            'schools_id' => $school->id
        ]); 

        //create and save the coach
        $user = User::create([
            'schools_id' => $school->id, 
            'programs_id' => $programs->id, 
            'first_name' => request('first_name'), 
            'last_name' => request('last_name'), 
            'email' => request('email'), 
            'password' => bcrypt(request('password'))
        ]); 

        //Auth helper function to log the user in
        auth()->login($user);

        //send welcome email
        Mail::to($user)->send(new WelcomeCoach($user));

        \Stripe\Stripe::setApiKey('sk_test_SajN5YVRVu0ZOehysMuLwkdm');

        $user->createAsStripeCustomer();
        
        // flash message for user to finish filling out profile
        Session::flash('welcome', 'Thanks for registering with AlumSpot!');
        
        // Redirect to home page
        return redirect('/payment');
        
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
        Auth::guard()->logout();
        return redirect('/');
    }
}
