<?php

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

Route::get('/','HomeController@welcome');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('projects','ProjectController');
Route::get('tasks/charts','TasksController@charts')->name('tasks.charts');

Route::resource('tasks','TasksController');
Route::post('tasks/{tasks}/check','TasksController@check')->name('tasks.check');

