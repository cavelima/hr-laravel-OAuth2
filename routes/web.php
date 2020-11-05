<?php

use Illuminate\Support\Facades\Route;

use function Symfony\Component\String\b;
use App\Http\Controllers\Auth\LoginController;
use Illuminate\Support\Facades\Auth;

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

Route::get('/', function() {
    return view('welcome');
});

Auth::routes();

Route::get('/auth/redirect/{provider}', 'App\Http\Controllers\Auth\LoginController@redirectToProvider');
Route::get('/auth/{provider}/callback', 'App\Http\Controllers\Auth\LoginController@handleProviderCallback');

Route::resource('employees', 'App\Http\Controllers\EmployeeController')->middleware('auth');
Route::resource('departments', 'App\Http\Controllers\DepartmentController')->middleware('auth');

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

