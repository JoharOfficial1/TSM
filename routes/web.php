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
    return view('auth.login');
});

Auth::routes();
Route::group(['middleware' => 'auth'], function () {
    Route::post('dashboard/getProjectByAjax', 'App\Http\Controllers\DashboardController@getProjectByAjax')->name('dashboard.getProjectByAjax');
    Route::resource('dashboard', 'App\Http\Controllers\DashboardController');

    Route::resource('projects', 'App\Http\Controllers\ProjectController');

    Route::post('tasks/updateTaskPriorityByAjax', 'App\Http\Controllers\TaskController@updateTaskPriorityByAjax')->name('dashboard.updateTaskPriorityByAjax');
    Route::resource('tasks', 'App\Http\Controllers\TaskController');
});
