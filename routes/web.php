<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\Admin\DepamentController;
use App\Http\Controllers\Admin\listUserController;
use App\Http\Controllers\Auth\AuthController;
use App\Http\Controllers\ComplaintController;
use App\Http\Controllers\Admin\ComplaintController as AdComplaint;
use App\Http\Controllers\UserController;
use App\Http\Controllers\Admin\FeedController;
use App\Http\Controllers\FeedController as UserFeed;
use App\Models\Complaint;
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



Route::middleware(['auth.admin'])->group(function () {
    Route::get('/admin',  [AdminController::class, 'adminPage'])->name('admin.home');

    // Department module..
    Route::get('/make-department',  [AdminController::class, 'makeDepartment'])->name('admin.makeDepartment');
    Route::post('/make-department',  [DepamentController::class, 'createDepartment'])->name('admin.createDepartment');
    Route::get('/edit-department/{id}',  [AdminController::class, 'editDepartment'])->name('admin.editDepartment');
    Route::post('/edit-department',  [DepamentController::class, 'updateDepartment'])->name('admin.updateDepartment');
    Route::get('/list-departments',  [DepamentController::class, 'listDepartments'])->name('admin.listDepartments');
    Route::get('/delete-department/{id}',  [DepamentController::class, 'deleteDepartment'])->name('admin.deleteDepartment');

    //User module..
    Route::get('/list-Admins', [listUserController::class, 'listAdmin'])->name('admin.listAdmins');
    Route::get('/list-users', [listUserController::class, 'listUser'])->name('admin.listUsers');
    Route::get('/edit-user/{id}', [listUserController::class, 'editUser'])->name('admin.editUser');
    Route::post('/update-user', [listUserController::class, 'updateUser'])->name('admin.updateUser');
    Route::get('/delete-user/{id}', [listUserController::class, 'deleteUser'])->name('admin.deleteUser');
    Route::get('edit-user-status/{user}',[listUserController::class,'updateStatus'])->name('admin.updateStatus');

    //Complaints module..
    Route::get('/complaints', [AdComplaint::class, 'index'])->name('admin.Complaints');
    Route::get('/solved-complaints', [AdComplaint::class, 'SolvedComplaints'])->name('admin.SolvedComplaints');
    Route::get('/complaint/delete/{id}', [AdComplaint::class , 'deleteComplaint'])->name('admin.deleteComplaint');
    Route::get('/complaint-status/{id}/{status}', [AdComplaint::class , 'changeStatus'])->name('admin.changeStatus');


    // Types
    Route::get('/types', [AdComplaint::class, 'complaintTypes'])->name('admin.complaintTypes');
    Route::post('/types-add', [AdComplaint::class, 'complaintTypeAdd'])->name('admin.complaintTypeAdd');
    Route::post('/types-update', [AdComplaint::class, 'complaintTypeUpdate'])->name('admin.complaintTypeUpdate');
    Route::Get('/deleteType/{id}',[AdComplaint::class, 'complaintTypeDelete'])->name('admin.complaintTypeDelete');
    //feed
    Route::get('/list-feeds',[FeedController::class,'index'])->name('admin.listFeeds');
    Route::get('/make-post',[FeedController::class,'create'])->name('admin.makePost');
    Route::post('/make-post',[FeedController::class,'add'])->name('admin.addPost');

    Route::get('/edit-post/{id}',[FeedController::class,'edit'])->name('admin.editPost');
    Route::post('/edit-post',[FeedController::class,'update'])->name('admin.updatePost');

    Route::get('/feeds/preview-post/{slug}',[FeedController::class,'preview'])->name('admin.previewPost');

    // User routes
});


Route::get('/print-recipt/complaint/{id}' , [ComplaintController::class , 'printReciept'])->name('recipt.print_complaint');

Route::middleware(['auth.user'])->group(function () {

    Route::get('/', [UserController::class , 'index'])->name('user.home');

    Route::get('/recipt/complaint/{id}' , [ComplaintController::class , 'makeReciept'])->name('recipt.complaint');
    // Route::get('/print-recipt/complaint/{id}' , [ComplaintController::class , 'printReciept'])->name('recipt.print_complaint');

    Route::get('/profile',[UserController::class,'profile'])->name('user.profile');
    Route::post('/profile',[UserController::class,'update'])->name('user.updateUser');

    // COmplaint routes
    Route::get('/make-complaint', [ComplaintController::class , 'makeComplaint'])->name('user.makeComplaint');
    Route::get('/list-complaint', [ComplaintController::class , 'index'])->name('user.listComplaint');
    Route::post('/make-complaint', [ComplaintController::class , 'addComplaint'])->name('user.addComplaint');
    Route::get('/complaint/delete/{id}', [ComplaintController::class , 'deleteComplaint'])->name('user.deleteComplaint');
    Route::get('/feeds',[UserFeed::class,'index'])->name('user.feeds');
    Route::get('/feeds/{slug}',[UserFeed::class,'showFeed'])->name('user.showPost');

});

Route::get('/logout', [AuthController::class, 'logout'])->name('logout')->middleware('auth');

Route::middleware(['auth.not'])->group(function () {
    // Get Routes
    Route::get('/register', [AuthController::class, 'registerPage'])->name('register');
    Route::get('/login', [AuthController::class, 'loginPage'])->name('login');
    // Post Routes
    Route::post('/register', [AuthController::class, 'create'])->name('register.post');
    Route::post('/login', [AuthController::class, 'login'])->name('login.post');

    Route::get('/verify-otp/{u_id}', [AuthController::class, 'verifyOtp'])->name('verify.otp');
    Route::post('/verify-otp/{u_id}', [AuthController::class, 'verifyOtpPost'])->name('verify.otp.post');

});

Route::get('test', function () {

    $complaint = Complaint::with('user')->first();

    $data = [
        'title_sentece' => 'Status of your complaint <span style="color: blue"> #' . $complaint->invoice_number . '</span> Has been changed.',
        'desc' => "Dear,  " . $complaint->user->name . '. Complaint number <span style="color: blue"> #' . $complaint->invoice_number . '</span>\'s has been solved. Please print recipt from the below button.'
    ];

    return view('emails.statusChangemail' , ['complaint' => $complaint , 'data' => $data]);
});
