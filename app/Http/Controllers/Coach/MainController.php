<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Alumni;
use AlumSpot\Event;
use Image;
use AlumSpot\Http\Controllers\Controller;

class MainController extends Controller
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
    
    public function profile()
    {
        return view('Coach/profileView/edit');
    }
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //retrieve the teams id of logged in user 
        $programsid = Auth::user()->programs_id;
        //retrieve these columns from the same team id of specified user
        $industries = Alumni::where('programs_id', '=', $programsid)->distinct('industry')->count('industry');
        $companies = Alumni::where('programs_id', '=', $programsid)->distinct('company')->count('company');
        $states = Alumni::where('programs_id', '=', $programsid)->distinct('state')->count('state');
        
        //retrieve all events ordered by earliest created_at column
        $event = Event::where('programs_id', '=', $programsid)->orderBy('datetime', 'desc')->get();
        
        return view('Coach/home', compact('event', 'industries', 'companies', 'states'));
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
       $alumni = Alumni::find($id);
        
       return view('/Coach/profileView/alumni', compact('alumni'));
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
    public function update(Request $request)
    {
        //define instance of user to be used to edit properties
        $user = Auth::user();

        //store new avatar in system for user
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            //delete old avatar if available
            if($user->avatar !== 'default.jpg'){
                $file = public_path('/coach/' . $user->avatar);
                if(File::exists($file)){
                    unlink($file);
                }
            }
            //save image
            Image::make($avatar)->resize(300, 300)->save(public_path('/coach/' . $filename));
            
            //get user
            $user->avatar = $filename;
            $user->save();
        }
        
         //store new first name if available
         if ($request->filled('first_name')){
             $firstname = $request->input('first_name');
             $user->first_name = $firstname;
             $user->save();
         }
         
         //store new last name if available
         if ($request->filled('last_name')){
             $lastname = $request->input('last_name');
             $user->last_name = $lastname;
             $user->save();
         }
         
         //store new email if available
         if ($request->filled('email')){
             $email = $request->input('email');
             $user->email = $email;
             $user->save();
         }
         
         //store new phone number if available
         if ($request->filled('phone')){
             $phone = $request->input('phone');
             $user->phone = $phone;
             $user->save();
         }
         
         //store new education if available
         if ($request->filled('education')){
             $education = $request->input('education');
             $user->education = $education;
             $user->save();
         }
         
         //store new start year if available
         if ($request->filled('startYear')){
             $startYear = $request->input('startYear');
             $user->startYear = $startYear;
             $user->save();
         }
         
         //store new city if available
         if ($request->filled('city')){
             $city = $request->input('city');
             $user->city = $city;
             $user->save();
         }
         
         //store new state if available
         if ($request->filled('state')){
             $state = $request->input('state');
             $user->state = $state;
             $user->save();
         }
         
         return view('Coach/profileView/edit');
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
