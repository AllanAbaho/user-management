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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/users/index', 'UsersController@index')->name('users.index');
Route::get('/users/create', 'UsersController@create')->name('users.create');
Route::post('/users/store', 'UsersController@store')->name('users.store');
Route::get('/users/edit/{id}', 'UsersController@edit')->name('users.edit');
Route::put('/users/update/{id}', 'UsersController@update')->name('users.update');
Route::delete('/users/delete/{id}', 'UsersController@delete')->name('users.delete');

//project routes
Route::get('/projects/index', 'ProjectsController@index')->name('projects.index');
Route::get('/projects/create', 'ProjectsController@create')->name('projects.create');
Route::post('/projects/store', 'ProjectsController@store')->name('projects.store');
Route::get('/projects/edit/{id}', 'ProjectsController@edit')->name('projects.edit');
Route::put('/projects/update/{id}', 'ProjectsController@update')->name('projects.update');
Route::delete('/projects/delete/{id}', 'ProjectsController@delete')->name('projects.delete');

//attendance routes
Route::get('/attendance/index', 'AttendanceController@index')->name('attendance.index');
Route::get('/attendance/create', 'AttendanceController@create')->name('attendance.create');
Route::post('/attendance/store', 'AttendanceController@store')->name('attendance.store');
Route::get('/attendance/edit/{id}', 'AttendanceController@edit')->name('attendance.edit');
Route::put('/attendance/update/{id}', 'AttendanceController@update')->name('attendance.update');
Route::delete('/attendance/delete/{id}', 'AttendanceController@delete')->name('attendance.delete');

