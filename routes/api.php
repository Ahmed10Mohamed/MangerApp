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


Route::group(['namespace' => 'App\Http\Controllers\API', 'middleware' => 'APISettings'], function () {


    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');

    Route::group(['middleware' => 'auth:api'], function () {

                    /******** Group  **********/

        Route::resource('Group', 'GroupController');

                    /******** Task  **********/
        Route::get('Task','TaskController@all_tasks');
        Route::get('Task/{id}','TaskController@task');
        Route::post('add_task','TaskController@add_task');
        Route::delete('delete_task/{id}','TaskController@delete_task');



    });




});
