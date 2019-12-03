<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/* --------------- LOGIN & HOME ROUTES -----------------
 * 
 * 
 */

    Auth::routes();
    Route::get('/', 'LandPageController@index')->name('home');
    
    Route::group(['middleware' => 'alumni_guest'], function(){
        Route::get('/alumni/login', 'Auth\AlumniLoginController@showLoginForm')->name('alumni.login');
        Route::post('/alumni/login', 'Auth\AlumniLoginController@login')->name('alumni.login.submit');
    });

    
/* --------------- REGISTER & LOGOUT ROUTES -----------------
 * 
 * 
 */
    //Route to registration page
    Route::get('/register', 'Alumni\RegistrationController@index');
    
    Route::prefix('/coach')->group(function() {
        //route to store register user & school
        Route::post('/register', 'Coach\RegistrationController@store');
        //Route to log coach out
        Route::get('/logout', 'Coach\RegistrationController@destroy');
    });
    
    Route::prefix('/alumni')->group(function() {
        //route to store register user & school
        Route::post('/register', 'Alumni\RegistrationController@store');
        //Route to log alumni out
        Route::get('/logout', 'Alumni\RegistrationController@destroy');
    });

/* --------------- Coach Routes ------------------ 
 * 
 * 
 * 
 */
    Route::prefix('/coach')->group(function() {
        Route::get('/home', 'Coach\MainController@index')->name('coach.home');
        //Email Routes
        Route::get('/emailCenter', 'Coach\EmailController@index')->name('coach.emailCenter');
        Route::get('/email/create', 'Coach\EmailController@create');
        Route::post('/email', 'Coach\EmailController@store');
        Route::get('/email/elist', 'Coach\ElistController@index');
        Route::post('/email/elist', 'Coach\ElistController@store');
        Route::get('/delete/elist/{elist}', 'Coach\ElistController@destroy');
        //comment routes
        Route::post('/{event}/comment/event', 'Coach\CommentsController@storeEvent');
        Route::get('/delete/comment/{comment}', 'Coach\CommentsController@delete');
        //alumni search routes
        Route::get('/alumSearch', 'Coach\SearchController@index')->name('coach.alumSearch');
        Route::get('/alumSearch/{alumni}', 'Coach\SearchController@show');
        Route::get('/alumSearch/industry/{industry}', 'Coach\SearchController@filterIndustry');
        Route::get('/alumSearch/company/{company}', 'Coach\SearchController@filterCompany');
        Route::get('/alumSearch/gradYear/{gradYear}', 'Coach\SearchController@filterGradYear');
        Route::get('/delete/{alumni}', 'Coach\SearchController@delete');
        // activity routes
        Route::get('/feed', 'Coach\ActivityController@index')->name('coach.feed');
        //profile routes
        Route::get('/profile', 'Coach\MainController@profile')->name('coach.profile');
        Route::post('/profile', 'Coach\MainController@update');
        //event routes
        Route::get('/event', 'Coach\EventController@index')->name('coach.events');
        Route::post('/event', 'Coach\EventController@store');
        Route::get('/delete/event/{event}', 'Coach\EventController@delete');
        Route::get('/event/{event}', 'Coach\EventController@show')->name('coach.eventview');
    });
    
    
/* ---------------- Alumni Routes ------------------
 * 
 * 
 */
    
    Route::prefix('/alumni')->group(function() {
        Route::get('/home', 'Alumni\ActivityController@index')->name('alumni.home');
        //comment routes
        Route::post('/{event}/comment/event', 'Alumni\CommentsController@storeEvent');
        Route::get('/delete/comment/{comment}', 'Alumni\CommentsController@delete');
        //alumsearch and individual profile view routes
        Route::get('/alumSearch', 'Alumni\SearchController@index')->name('alumni.alumSearch');
        Route::get('/alumSearch/{alumni}', 'Alumni\SearchController@showAlum');
        Route::get('/alumSearch/coach/{user}', 'Alumni\SearchController@showCoach');
        Route::get('/alumSearch/industry/{industry}', 'Alumni\SearchController@filterIndustry');
        Route::get('/alumSearch/company/{company}', 'Alumni\SearchController@filterCompany');
        Route::get('/alumSearch/gradYear/{gradYear}', 'Alumni\SearchController@filterGradYear');
        //profile routes
        Route::get('/profile', 'Alumni\MainController@profile')->name('alumni.profile'); 
        Route::post('/profile', 'Alumni\MainController@update');
        //event routes
        Route::get('/event/view', 'Alumni\EventController@index');
        Route::post('/event/rsvp/{event}', 'Alumni\EventController@store');
        Route::get('/event/{event}', 'Alumni\EventController@show')->name('alumni.eventview');
    });


