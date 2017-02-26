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
Route::get('/agenda/datas', 'AppointmentsController@ajaxdate');
Route::resource('/profissionais', 'ProfessionalsController');
Route::resource('/clientes', 'CustomersController');
Route::resource('/procedimentos', 'ProceduresController');
Route::resource('/agenda', 'AppointmentsController');
Route::get('/admin', 'AdminController@index');

Route::get('/', function () {
    return redirect ('/admin');
});
