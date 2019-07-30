<?php

namespace AlumSpotDev\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use Image;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Auth;
use AlumSpotDev\Http\Controllers\Controller;

class MainController extends Controller
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
    public function fundraiser()
    {
        return view('Alumni/fundraisers');
    }
    public function profile()
    {
        return view('Alumni/profileView/edit');
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
        $user = Auth::guard('alumni')->user();
        
        //store new avatar in system for user
        if ($request->hasFile('avatar')){
            $avatar = $request->file('avatar');
            $filename = time() . '.' . $avatar->getClientOriginalExtension();
            //delete old avatar if available
            if($user->avatar !== 'default.jpg'){
                $file = public_path('/alumni/' . $user->avatar);
                if(File::exists($file)){
                    unlink($file);
                }
            }
            //save image
            Image::make($avatar)->resize(300, 300)->save(public_path('/alumni/' . $filename));
            
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
         
         //store new class of if available
         if ($request->filled('gradYear')){
             $gradYear = $request->input('gradYear');
             $user->gradYear = $gradYear;
             $user->save();
         }
         
         //store new class of if available
         if ($request->filled('gradYear')){
             $gradYear = $request->input('gradYear');
             $user->gradYear = $gradYear;
             $user->save();
         }
         
         //store phone number if available
         if ($request->filled('phone')){
             $phone = $request->input('phone');
             $user->phone = $phone;
             $user->save();
         }
         
         //store new industry if available
         if ($request->filled('industry')){
             $industry = $request->input('industry');
             $user->industry = $industry;
             $user->save();
         }
         
         //store new company if available
         if ($request->filled('company')){
             $company = $request->input('company');
             $user->company = $company;
             $user->save();
         }
         
         //store new title if available
         if ($request->filled('title')){
             $title = $request->input('title');
             $user->title = $title;
             $user->save();
         }
         
         //store new bio if available
         if ($request->filled('bio')){
             $bio = $request->input('bio');
             $user->bio = $bio;
             $user->save();
         }
         
         //store new class of if available
         if ($request->filled('city')){
             $city = $request->input('city');
             $user->city = $city;
             $user->save();
         }
         
         //store new class of if available
         if ($request->filled('state')){
             $state = $request->input('state');
             $user->state = $state;
             $user->save();
         }
         
         return view('Alumni/profileView/edit');
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
