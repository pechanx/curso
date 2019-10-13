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

Route::group(['middleware' => 'auth'], function()
{
    //URL DE SOLO USUARIOS LOGEADOS
    Route::get('/administracion','HomeController@administracion');
    Route::get('administracion/roles_ajax', 'RolController@roles_ajax');   
    Route::resource('administracion/roles', 'RolController');
    


});