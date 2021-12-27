<?php

use App\Http\Controllers\CityController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Auth;
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

Route::group(['middleware'=>'UserCheck'], function(){
    Route::get('/', function(){
        return view('pages.home');
    });
});

// Route::get('/', [UserController::class , 'loginPage']);

Route::get('/login', [UserController::class , 'loginPage']);
Route::get('/register', [UserController::class , 'registerPage']);
Route::get('/logout', function(){
    Auth::logout();
    return redirect('/');
});

Route::post('/login', [UserController::class , 'login'])->name('login');
Route::post('/register', [UserController::class , 'register'])->name('register');


Route::get('/getCities/{state}', [CityController::class , 'getCities']);