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

// RUTAS CRUD PARA USUARIOS FRONTEND
Route::get('/get_users', 'EndPointsController@get_all_users')->name('all_users');
Route::get('/get_users/create', 'EndPointsController@create_users')->name('create_users');
Route::post('/get_users/create', 'EndPointsController@store_users')->name('insert_user');
Route::get('/get_users/edit/{id}', 'EndPointsController@edit_users')->name('edit_user');
Route::post('/get_users/update/{id}', 'EndPointsController@update_user')->name('update_user');
Route::post('/get_users/delete/{id}', 'EndPointsController@delete_user')->name('delete_user');
// RUTAS CRUD PARA TIPOS DE DOCUMENTO FRONTEND
Route::get('/get_type_docs', 'EndPointsController@get_all_typeDocs')->name('all_type_docs');
Route::get('/get_type_docs/create', 'EndPointsController@create_type_docs')->name('create_type_docs');
Route::post('/get_type_docs/create', 'EndPointsController@store_type_docs')->name('insert_type_docs');
Route::get('/get_type_docs/edit/{id}', 'EndPointsController@edit_type_docs')->name('edit_type_docs');
Route::post('/get_type_docs/update/{id}', 'EndPointsController@update_type_docs')->name('update_type_docs');
Route::post('/get_type_docs/delete/{id}', 'EndPointsController@delete_type_docs')->name('delete_type_docs');
