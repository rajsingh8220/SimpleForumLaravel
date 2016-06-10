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

Route::group(['middleware' => ['web']], function () {
   
    Route::get('/', [
        'uses'=>'UserController@getHome',
        'as'=>'home'

    ]);

    
    
    
    
    
    Route::get('/register', [
        'uses'=>'UserController@registerForm',
        'as'=>'register'
    ]);
    Route::get('/login', [
        'uses'=>'UserController@loginForm',
        'as'=>'login'
    ]);
    
    
    
    
    Route::post('/login', [
        'uses'=>'UserController@loginRequest',
        'as'=>'login'
    ]);
    
    Route::get('/logout', [
        'uses'=>'UserController@logoutRequest',
        'as'=>'logout'
    ]);

    

    Route::post('/register', [
        'uses'=>'UserController@registerRequest',
        'as'=>'register'

    ]);
    
    Route::get('/search', [
        'uses'=>'QuestionController@searchQuestion',
        'as'=>'search.question'

    ]);
    
    Route::post('/search', [
        'uses'=>'QuestionController@searchQuestion',
        'as'=>'search.question'

    ]);
    
    
    Route::get('/admin/access-denied', function()
{
    return view('admin.denied');
});
    
    

});

Route::group(['middleware' => ['auth']], function () {
    Route::get('/profile', [
        'uses'=>'ProfileController@showProfile',
        'as'=>'profile'
    ]);
    Route::post('/edit-profile', [
        'uses'=>'ProfileController@editProfile',
        'as'=>'edit.profile'

    ]);
    
    Route::get('/questions', [
        'uses'=>'QuestionController@getQuestion',
        'as'=>'get.question'

    ]);
    
    Route::get('/question-delete/{question_id}', [
        'uses'=>'QuestionController@getDeleteQuestion',
        'as'=>'delete.question'

    ]);
    
    Route::post('/questions', [
        'uses'=>'QuestionController@postQuestion',
        'as'=>'post.question'

    ]);
    
    Route::post('/upload-profile-pic', [
        'uses'=>'ProfileController@uploadProfilePic',
        'as'=>'upload.profile'

    ]);
});

Route::group(['middleware' => ['admin','auth','web']], function () {
    Route::get('/admin', [
        'uses'=>'AdminController@adminIndex',
        'as'=>'admin'
    ]);
    Route::get('/admin-questions', [
        'uses'=>'AdminController@getQuestion',
        'as'=>'admin_questions'
    ]);
});
