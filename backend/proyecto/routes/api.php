<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

//Users
Route::post('users', [App\Http\Controllers\Api\V1\UserController::class, 'store']);
Route::get('get_id_user/{email}', [App\Http\Controllers\Api\V1\UserController::class, 'show']);

// Gymkana
Route::get('getnamegymkanabyid/{id}', [App\Http\Controllers\Api\V1\GymkanaController::class, 'getNameGymkanaById']);

//Gymkanas instance
Route::get('gymkanas_instances_active', [App\Http\Controllers\Api\V1\Gk_instanceController::class, 'allActive']);
Route::get('gymkanas_instances_future', [App\Http\Controllers\Api\V1\Gk_instanceController::class, 'allFuture']);
Route::get('gymkanas_instances/{gymkana}', [App\Http\Controllers\Api\V1\Gk_instanceController::class, 'show']);
Route::get('/getgymkanabyidinstancia/{id}', [App\Http\Controllers\Api\V1\Gk_instanceController::class, 'getGymkanaByIdInstancia']);

//Test
Route::get('tests/{id}', [App\Http\Controllers\Api\V1\TestController::class, 'index']);
Route::get('getresponses/{id_group}/{id_test}', [App\Http\Controllers\Api\V1\Group_testController::class, 'getResponses']);
Route::get('test/{id}', [App\Http\Controllers\Api\V1\TestController::class, 'show']);

//Group_test
Route::post('group_test/', [App\Http\Controllers\Api\V1\Group_testController::class, 'store']);
Route::get('getcurrentscore', [App\Http\Controllers\Api\V1\Group_testController::class, 'getCurrentScore']);

//Group
Route::get('getgroupdescription/{id_group}', [App\Http\Controllers\Api\V1\GroupController::class, 'getGroupDescription']);
Route::get('getdescriptionbyid/{id}', [App\Http\Controllers\Api\V1\GroupController::class, 'getDescriptionById']);

//Participant
Route::get('getparticipant/{id_group}', [App\Http\Controllers\Api\V1\ParticipantController::class, 'show']);
Route::get('getparticipantbyid/{id}', [App\Http\Controllers\Api\V1\ParticipantController::class, 'getParticipantById']);
Route::get('getshowparticipant/{id_gymkana_instance}/{id_group}', [App\Http\Controllers\Api\V1\ParticipantController::class, 'getShowParticipant']);
Route::post('createparticipant/', [App\Http\Controllers\Api\V1\ParticipantController::class, 'store']);

//Inscription
Route::post('inscription', [App\Http\Controllers\Api\V1\InscriptionController::class, 'store']);
Route::get('getinscription/{id_gymkana_instance}/{id_participant}', [App\Http\Controllers\Api\V1\InscriptionController::class, 'show']);

// User_group
Route::get('getgroup/{id_user}', [App\Http\Controllers\Api\V1\User_groupController::class, 'getUserGroupById']);
Route::get('getallusergroup/', [App\Http\Controllers\Api\V1\User_groupController::class, 'getAllUserGroup']);
Route::get('groups', [App\Http\Controllers\Api\V1\User_groupController::class, 'index']);


