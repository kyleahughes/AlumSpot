<?php

namespace AlumSpot\Http\Controllers\Coach;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use AlumSpot\Http\Controllers\Controller;
use AlumSpot\Alumni;
use AlumSpot\Fundraiser;

class SearchController extends Controller
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
        //get list of alumni from the same school as the coach
        $programsid = Auth::user()->programs_id;
        $alumni = Alumni::where('programs_id', '=', $programsid)->orderBy('last_name', 'asc')->get();
        
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Coach/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function filterIndustry($industrys)
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::user()->programs_id;
        //filter alumni by industry
        $alumni = Alumni::where('programs_id', '=', $programsid)->where('industry', '=', $industrys)->orderBy('industry', 'asc')->get();

        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Coach/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
    }
    public function filterGradYear($gradYears)
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::user()->programs_id;
        //filter alumni by gradYear
        $alumni = Alumni::where('programs_id', '=', $programsid)->where('gradYear', '=', $gradYears)->orderBy('gradYear', 'asc')->get();
        
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Coach/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
    }
    public function filterCompany($companys)
    {
        //get list of alumni from the same school as the coach
        $programsid = Auth::user()->programs_id;
        //filter alumni by company
        $alumni = Alumni::where('programs_id', '=', $programsid)->where('company', '=', $companys)->orderBy('company', 'asc')->get();
                
        $industry = Alumni::whereNotNull('industry')->orderBy('industry', 'asc')->pluck('industry')->unique();
        $gradYear = Alumni::whereNotNull('gradYear')->orderBy('gradYear', 'asc')->pluck('gradYear')->unique();
        $company = Alumni::whereNotNull('company')->orderBy('company', 'asc')->pluck('company')->unique();
        
        return view('Coach/alumSearch', compact('alumni', 'industry', 'gradYear', 'company'));
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
    public function delete($id)
    {
        //delete the alumni user and all challenges with their id
        Alumni::where('id', '=', $id)->delete();
        Fundraiser::where('alumnis_id', '=', $id)->delete();
        
        return back();
    }
}
