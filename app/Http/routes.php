<?php

Route::get('/', 'Site\PageController@home');
Route::get('about', 'Site\PageController@about');
Route::get('contact', 'Site\PageController@contact');
Route::get('faq', 'Site\PageController@faq');
Route::get('contribute', 'Site\PageController@contribute');

// Authentication routes...
Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Registration routes...
Route::get('auth/register', 'Auth\AuthController@getRegister');
Route::post('auth/register', 'Auth\AuthController@postRegister');

// GitHub routes
Route::get('auth/github', 'Auth\AuthController@redirectToProvider');
Route::get('auth/github/callback', 'Auth\AuthController@handleProviderCallback');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');

Route::group(['prefix' => 'meetups'], function () {
    Route::get('/', 'Meetup\MeetupController@index');
    Route::get('meetup/{slug}', 'Meetup\MeetupController@show');
    Route::get('meetup/{slug}/attendees', 'Meetup\AttendeeController@show');
});