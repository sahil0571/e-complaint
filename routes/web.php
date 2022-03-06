<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepamentController;
use App\Http\Controllers\Admin\listUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ComplaintController;
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

Route::get('/', function () {
    return view('pages.home');
});

Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin',  [AdminController::class , 'adminPage'])->name('admin.home');

    //department module..
    Route::get('/make-department',  [AdminController::class , 'makeDepartment'])->name('admin.makeDepartment');
    Route::post('/make-department',  [DepamentController::class , 'createDepartment'])->name('admin.createDepartment');
    Route::get('/edit-department/{id}',  [AdminController::class , 'editDepartment'])->name('admin.editDepartment');
    Route::post('/edit-department',  [DepamentController::class , 'updateDepartment'])->name('admin.updateDepartment');
    Route::get('/list-departments',  [DepamentController::class , 'listDepartments'])->name('admin.listDepartments');
    Route::get('/delete-department/{id}',  [DepamentController::class , 'deleteDepartment'])->name('admin.deleteDepartment');

    //User module..
    route::get('/listAdmin',[listUserController::class,'listAdmin'])->name('listAdmin');
    route::get('/listUser',[listUserController::class,'listUser'])->name('listUser');
    
    //Complaints module..
    route::get('/Complaints',[ComplaintController::class,'Complaints'])->name('Complaints');
    route::get('/SolvedComplaints',[ComplaintController::class,'SolvedComplaints'])->name('SolvedComplaints');

});

Route::get('/logout', [AuthController::class , 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth.not'])->group(function () {
    // Get Routes
    Route::get('/register', [AuthController::class , 'registerPage'])->name('register');
    Route::get('/login', [AuthController::class , 'loginPage'])->name('login');
    // Post Routes
    Route::post('/register', [AuthController::class , 'registercreate'])->name('register.post');
    Route::post('/login', [AuthController::class , 'login'])->name('login.post');

});

