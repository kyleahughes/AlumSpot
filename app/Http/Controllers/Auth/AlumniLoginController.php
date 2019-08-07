<?php

namespace AlumSpotDev\Http\Controllers\Auth;

use Illuminate\Http\Request;
use AlumSpotDev\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class AlumniLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Alumni Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */
    
    public function __construct()
    {
        $this->middleware('guest:alumni');
    }

    public function showLoginForm()
    {
        return view('auth.alumni-login');
    }
    
    public function login(Request $request) 
    {
        //validate the form
        $this->validate($request, [
           'email' => 'required|email',
           'password' => 'required'
        ]);
        
        //attempt to log the alumni in
        if (Auth::guard('alumni')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember))
        {
            //if successful, redirect to alumni home page
            return redirect()->route('alumni.home');
        }

        //if unsuccessful, redirect back to login form
        return redirect()->back();

        
    }
}
