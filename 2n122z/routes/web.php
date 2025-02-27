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

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/customers', [App\Http\Controllers\CustomerController::class, 'index'])->name('customers.index')->middleware('auth');
Route::get('/projects', [App\Http\Controllers\ProjectController::class, 'index'])->name('projects.index')->middleware('auth');
Route::get('/customers/create', [App\Http\Controllers\CustomerController::class, 'create'])->name('customers.create')->middleware('auth');
Route::post('/customers/create', [App\Http\Controllers\CustomerController::class, 'store'])->name('customers.store')->middleware('auth');
Route::get('/projects/create', [App\Http\Controllers\ProjectController::class, 'create'])->name('projects.create')->middleware('auth');
Route::post('/projects/create', [App\Http\Controllers\ProjectController::class, 'store'])->name('projects.store')->middleware('auth');
Route::get('/customers/edit/{customer}', [App\Http\Controllers\CustomerController::class, 'edit'])->name('customers.edit')->middleware('auth');
Route::post('/customers/edit/{customer}', [App\Http\Controllers\CustomerController::class, 'update'])->name('customers.update')->middleware('auth');
Route::get('/customers/delete/{customer}', [App\Http\Controllers\CustomerController::class, 'destroy'])->name('customers.delete')->middleware('auth');
Route::get('/customers/view/{customer}', [App\Http\Controllers\CustomerController::class, 'show'])->name('customers.view')->middleware('auth');

Route::get('/', 'CustomerController@index');
Route::get('/search', 'CustomerController@search')->name('customers.search');

Route::get('/', 'ProjectController@index');
Route::get('/search', 'ProjectController@search')->name('projects.search');