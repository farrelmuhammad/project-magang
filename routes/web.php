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
    return view('index');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
Route::get('/admin','ProductController@index');
Route::get('/admin/add','ProductController@create');
Route::post('/admin/adding','ProductController@store');
Route::get('/admin/{id}/edit','ProductController@edit');
Route::patch('/admin/editing/{id}','ProductController@update');
Route::delete('/admin/destroy/{id}','ProductController@destroy');