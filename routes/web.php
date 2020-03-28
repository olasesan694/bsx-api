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
    return view('index');
});

Route::get('/discuss', 'DiscussionController@index')->middleware('auth')->name('discuss.index');
Route::get('/invite', 'InvitesController@get')->middleware('auth');

Route::get('/contacts', 'ContactsController@get');
Route::get('/conversation/{id}', 'ContactsController@getMessagesFor');
Route::post('/conversation/send', 'ContactsController@send');

Route::post('/invite/send', 'InvitesController@send');
Route::post('/accept/send', 'AcceptController@send');

Route::get('/intro', 'IntroController@index');
Route::get('/accept', 'AcceptController@index')->middleware('auth');

Route::get('/connect', function () {
    return view('connect');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
