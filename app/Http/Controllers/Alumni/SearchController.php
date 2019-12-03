<?php

namespace AlumSpot\Http\Controllers\Alumni;

use Illuminate\Http\Request;
use AlumSpot\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Alumni;
use AlumSpot\User;

class SearchController extends Controller
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
    
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::guard('alumni')->user()->programs_id;
        $alumni = Alumni::where('programs_id', '=', $programsid)->orderBy('last_name', 'asc')->get();
        
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Alumni/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
    }
    
    public function filterIndustry($industrys)
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::guard('alumni')->user()->programs_id;
        //filter alumni by industry
        $alumni = Alumni::where('programs_id', '=', $programsid)->where('industry', '=', $industrys)->orderBy('industry', 'asc')->get();
        
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Alumni/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
    }
    public function filterGradYear($gradYears)
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::guard('alumni')->user()->programs_id;
        //filter alumni by gradyear
        $alumni = Alumni::where('programs_id', '=', $programsid)->where('gradYear', '=', $gradYears)->orderBy('gradYear', 'asc')->get();
                
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Alumni/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
    }
    public function filterCompany($companys)
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::guard('alumni')->user()->programs_id;
        //filter alumni by company
        $alumni = Alumni::where('programs_id', '=', $programsid)->where('company', '=', $companys)->orderBy('company', 'asc')->get();
        
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Alumni/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
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
    public function showAlum($id)
    {
        $alumni = Alumni::find($id);
        
        return view('/Alumni/profileView/alumni', compact('alumni'));
    }
    public function showCoach($id)
    {
        $coach = User::find($id);
        
        return view('/Alumni/profileView/coach', compact('coach'));
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
