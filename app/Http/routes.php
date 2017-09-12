<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/','HomeController@index');
Route::get('register/student','HomeController@studentRegister');
Route::get('register/teacher','HomeController@teacherRegister');

Route::resource('register', 'RegisterController');

Route::resource('log','LogController');
Route::get('logout','LogController@logout');

Route::resource('/profile','ProfileController');
Route::post('profile/materia','ProfileController@store');

//políticas y recursos
Route::get('/policies', 'ProfileController@policies');
Route::get('/listacotejo', 'ProfileController@listacotejo');
Route::get('/guiaobservacion', 'ProfileController@guiaobservacion');

//Materias
Route::get('materias/{matricula}','ProfileController@getMaterias');

Route::get('logs', '\Rap2hpoutre\LaravelLogViewer\LogViewerController@index');

