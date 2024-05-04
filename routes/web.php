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

// Route::get('/', function () {
//     return view('welcome');
// });

// Auth::routes();

// Route::get('/home', 'HomeController@index')->name('home');


Route::get('/users', 'RachmarController@users')->name('users.lists');
Route::post('/users', 'RachmarController@createUser')->name('users.create');
Route::delete('/users/{id}', 'RachmarController@deleteUser')->name('users.delete');
Route::patch('/users/{id}', 'RachmarController@updateUser')->name('users.update');

// Route::update('/users/{id}', 'RachmarController@users');
// Route::delete('/users/{id}', 'RachmarController@users');

// Route::get('/contacts', 'RachmarController@contacts');
// Route::get('/ideas', 'RachmarController@ideas');