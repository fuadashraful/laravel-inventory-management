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
Route::get('/home/edit_employee/{id}', 'EmployeeController@edit_employee')->name('edit_employee');
Route::post('/home/update_employee/{id}', 'EmployeeController@update_employee')->name('update_employee');

// Customer Routes
Route::get('/home/add_customer', 'CustomerController@index')->name('add_customer');
Route::post('/home/insert_customer', 'CustomerController@store')->name('insert_customer');
Route::get('/home/all_customer', 'CustomerController@get_customers')->name('all_customer');
Route::get('/home/view_customer/{id}', 'CustomerController@view_customer')->name('view_customer');
Route::get('/home/edit_customer/{id}', 'CustomerController@edit_customer')->name('edit_customer');
Route::post('/home/update_customer/{id}', 'CustomerController@update_customer')->name('update_customer');
Route::get('/home/delete_customer/{id}', 'CustomerController@delete_customer')->name('delete_customer');