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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/page', function () {
        return view('layouts.page',
            [
                'title' => "Page 2 - A little about the Author",
                'author' => json_encode([
                        "name" => "Fisayo Afolayan",
                        "role" => "Software Enginner",
                        "code" => "Always keeping it clean"
                ])
            ]
        );
    });






Auth::routes();

Route::view('/lp', 'call');
Route::post('/call', 'VoiceController@initiateCall')->name('initiate_call');


Route::get('/home', 'HomeController@index')->name('home');
Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}','ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');
Route::get('/event', 'ContactsController@index')->middleware('auth');
Route::get('/lastseen', 'ContactsController@lastseen')->middleware('auth');
Route::get('/lastseentt', 'ContactsController@lastseentt')->middleware('auth');
Route::get('/lastseentime/{id}', 'ContactsController@lastseentime')->middleware('auth');
Route::get('/listen', function(){

    return view('listenBroadcast');
})->middleware('auth');
Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
