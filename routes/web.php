<?php

use Illuminate\Support\Facades\Route;


Route::get('/', function () {
    return view('welcome');
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

// Employee Routes
Route::get('/home/add_employee', 'EmployeeController@index')->name('add_employee');
Route::post('/home/insert_employee','EmployeeController@store')->name('insert_employee');
Route::get('/home/all_employee', 'EmployeeController@get_employees')->name('all_employees');
Route::get('/home/delete_employee/{id}', 'EmployeeController@delete_employee')->name('delete_employee');
Route::get('/home/view_employee/{id}', 'EmployeeController@view_employee')->name('view_employee');