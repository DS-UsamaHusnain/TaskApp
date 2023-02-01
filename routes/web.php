<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\web\TaskController;

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
Route::redirect('/','/list-tasks');

Route::get('login',function(){
    return view('user.login');
});
Route::get('register',function(){
    return view('user.register');
});
Route::get('list-tasks','\App\Http\Controllers\web\TaskController@index');
Route::get('create','\App\Http\Controllers\web\TaskController@create');