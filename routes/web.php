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
    return view('welcome');
});




Route::group(['namespace' => 'App\Http\Controllers\Dashboard', 'middleware'=>'admin', 'prefix' => 'admin'], function() {



    Route::get('/', 'DashboardController@index');

        /***** Tasks *****/

        Route::get('Task', 'TaskController@index');
        Route::delete('delete_task/{id}', 'TaskController@delete_task');
        Route::get('Task/{id}', 'TaskController@show');


  });

  Route::group(['prefix' => 'admin','namespace' => 'App\Http\Controllers',], function () {
    Route::get('/login', 'AdminAuth\LoginController@showLoginForm')->name('login');
    Route::post('/login', 'AdminAuth\LoginController@login');
    Route::post('/logout', 'AdminAuth\LoginController@logout')->name('logout');

  });

