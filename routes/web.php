<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Auth;

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

Route::group(['middleware' => 'prevent-back-history'], function() {
    Auth::routes();

    Route::group(['middleware' => 'auth'], function() {
        Route::get('/my-projects', 'ProjectsController@index');
        Route::get('/projects/create', 'ProjectsController@create');

        Route::get('/projects', 'ProjectsController@other');
        Route::get('/projects/{project}', 'ProjectsController@show');

        Route::get('/api/my-projects', 'ProjectsController@apiMy');
        Route::get('/api/projects', 'ProjectsController@apiOther');
        Route::get('api/projects/{project}', 'ProjectsController@apiComments');

        Route::post('/projects', 'ProjectsController@store');
        Route::post('/projects/{project}/comments', 'ProjectsCommentsController@store');
    });

    Route::get('/about', 'IndexController@index');
    Route::get('/', 'IndexController@index');
});
