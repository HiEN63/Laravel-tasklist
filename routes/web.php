<?php
use App\Task;
use App\User;
use Illuminate\Http\Request;

Route::get('/' , 'TaskController@getTask');

Route::post('/task', 'TaskController@postTask');

Route::delete('/task/{task}', 'TaskController@deleteTask');

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/hoge', 'HogeController@hoge');
