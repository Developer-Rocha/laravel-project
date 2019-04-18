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

Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

Route::get('/contact', 'ContactController@index');

Route::get('/clients', 'ClientsController@index');

Route::post('/clients', 'ClientsController@insertClient')->name('insert-clients');

Route::get('/clients/{id}', 'ClientsController@deleteClient')->name('delete-client');

//Route::resource('/contacto', 'ContactController');
Route::resource('/task', 'TaskController');