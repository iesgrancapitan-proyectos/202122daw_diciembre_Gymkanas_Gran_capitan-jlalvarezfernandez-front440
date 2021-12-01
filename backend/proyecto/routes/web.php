<?php

use Illuminate\Support\Facades\Route;
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
    return redirect('/home');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home')->middleware('auth');
Route::get('/alumno', 'AlumnoController@index')->name('alumno')->middleware('auth');
Route::get('/admin', 'AdminController@index')->name('admin')->middleware('auth');

//Routes admin
Route::group([
    'middleware' => 'admin',
    'prefix' => 'admin',
    'namespace' => 'Admin'
], function(){
    Route::get('/gymkanas', 'GymkanaController@all');
    Route::get('/gymkanas/searcher', 'GymkanaController@searcher');
    Route::get('/add-gymkana', 'GymkanaController@add');
    Route::post('/create-gymkana', 'GymkanaController@create');
    Route::get('/gymkanas/start/{id}', 'GymkanaController@start');
    Route::post('/gymkanas/start-gymkana', 'GymkanaController@startGymkana');
    Route::get('/gymkanas/edit-view/{id}', 'GymkanaController@edit');
    Route::post('/gymkanas/update/{id}', 'GymkanaController@update');
    Route::post('/gymkanas/destroy/{id}', 'GymkanaController@destroy');

    Route::get('/tests', 'TestController@all');
    Route::get('/tests/{id}', 'TestController@testGk');
    Route::get('/add-test', 'TestController@add');
    Route::post('/create-test', 'TestController@create');
    Route::get('/tests/edit-view/{id}', 'TestController@edit');
    Route::post('/tests/update/{id}', 'TestController@update');
    Route::get('/tests/destroy/{id}', 'TestController@destroy');

    Route::get('/gk-instance', 'GkInstanceController@all');
    Route::get('/add-gk-instance', 'GkInstanceController@add');
    Route::post('/create-gk-instance', 'GkInstanceController@create');
    Route::get('/gk-instance/edit-view/{id}', 'GkInstanceController@edit');
    Route::post('/gk-instance/update/{id}', 'GkInstanceController@update');
    Route::post('/gk-instance/destroy/{id}', 'GkInstanceController@destroy');
    
    Route::get('/users', 'UserController@all');
    Route::get('/add-user', 'UserController@add');
    Route::post('/create-user', 'UserController@create');
    Route::get('/users/edit-view/{id}', 'UserController@edit');
    Route::post('/users/update/{id}', 'UserController@update');
    Route::get('/users/deactivate/{id}', 'UserController@deactivate');
    Route::get('/users/activate/{id}', 'UserController@activate');
    Route::get('/users/makeOrganizer/{id}', 'UserController@makeOrganizer');
    Route::post('/users/destroy/{id}', 'UserController@destroy');

    Route::get('/groups', 'GroupController@all');
    Route::get('/add-group', 'GroupController@add');
    Route::post('/create-group', 'GroupController@create');
    Route::get('/groups/edit-view/{id}', 'GroupController@edit');
    Route::post('/groups/update-group/{id}', 'GroupController@update');
    Route::post('/groups/destroy/{id}', 'GroupController@destroy');

    Route::get('/users-groups', 'UserGroupController@all');
    Route::get('/users-groups/edit-view/{id}', 'UserGroupController@edit');
    Route::get('/add-user-group', 'UserGroupController@add');
    Route::post('/create-user-group', 'UserGroupController@create');
    Route::post('/users-groups/destroy/{id}', 'UserGroupController@destroy');
    Route::post('/users-groups/update-group/{id}', 'UserGroupController@update');
    
    
    Route::get('/participants', 'ParticipantController@all');
    Route::get('/add-participant', 'ParticipantController@add');
    Route::post('/create-participant', 'ParticipantController@create');
    Route::post('/participants/destroy/{id}', 'ParticipantController@destroy');

    Route::get('/inscriptions', 'InscriptionController@all');
    Route::get('/inscriptions/accept/{id}', 'InscriptionController@accept');
    Route::get('/inscriptions/deny/{id}', 'InscriptionController@deny');


    Route::get('/score-gymkana', 'GKInstanceController@score');

    
    
});

Route::group([
    'middleware' => 'alumno',
    'prefix' => 'alumno',
    'namespace' => 'Alumno'
], function(){
    Route::get('/gymkanas', 'GymkanaController@all');
    
});

Route::group([
    'middleware' => 'organizador',
    'prefix' => 'organizador',
    'namespace' => 'Organizador'
], function(){
    Route::get('/tests', 'TestController@all');
    Route::get('/tests/{id}', 'TestController@allAnswer');
    Route::get('/tests/correct/{id}', 'TestController@correctAnswer');
    Route::get('/tests/incorrect/{id}', 'TestController@incorrectAnswer');
});

//routes alumno
