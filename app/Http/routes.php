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




Route::group(['middleware'=>['web']], function () {

    Route::get('/', function () {
        return view('welcome');
    })->name('home');

    Route::post('/signin',[
        'uses'=>'userController@postSignIn',
        'as'=>'signin'

    ]);

    Route::post('/signup',[
        'uses'=>'userController@postSignUp',
        'as'=>'signup'

    ]);

    Route::get('/dashboard',[
        'uses'=>'PostController@getDashboard',
        'as'=>'dashboard',
        'middleware'=>'auth'
    ]);

    Route::post('/createpost',[
        'uses'=>'PostController@postCreatePost',
        'as'=>'post.create'

    ]);


});