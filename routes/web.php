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

// Suppliers Routes
Route::get('/home/add_supplier', 'SupplierController@index')->name('add_supplier');
Route::post('/home/insert_supplier','SupplierController@store')->name('insert_supplier');
Route::get('/home/all_supplier', 'SupplierController@get_suppliers')->name('all_supplier');
Route::get('/home/edit_supplier/{id}', 'SupplierController@edit_supplier')->name('edit_supplier');
Route::get('/home/view_supplier/{id}', 'SupplierController@view_supplier')->name('view_supplier');
Route::post('/home/update_supplier/{id}', 'SupplierController@update_supplier')->name('update_supplier');
Route::get('/home/delete_supplier/{id}', 'SupplierController@delete_supplier')->name('delete_supplier');

// Category Routes
Route::get('/home/add_category', 'CategoryController@index')->name('add_category');
Route::post('/home/insert_category','CategoryController@store')->name('insert_category');
Route::get('/home/all_category', 'CategoryController@get_categories')->name('all_category');
Route::get('/home/delete_category/{id}', 'CategoryController@delete_category')->name('delete_category');