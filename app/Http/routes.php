<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/
Route::get('contact','WelcomeController@contact');
Route::get('about','PagesController@about');
Route::get('ekarat','PagesController@ekarat');
Route::get('home', 'HomeController@index');

Route::get('/', function () {
    return view('welcome');
    //return 'hello world';
});
Route::controllers([
    'auth' => 'Auth\AuthController',
    'password' => 'Auth\PasswordController',
]);
Route::get('sendemail', function () {

    $data = array(
        'name' => "Learning Laravel",
    );

    Mail::send('emails.welcome', $data, function ($message) {

        $message->from('evrae.data@gmail.com', 'Learning Laravel');

        $message->to('supachok_i@hotmail.com')->subject('Learning Laravel test email');

    });

    return "Your email has been sent successfully";

});