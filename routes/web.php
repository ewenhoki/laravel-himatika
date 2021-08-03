<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\StudentController;

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

Route::get('/', [SiteController::class, 'login'])->name('redirect.login');

Auth::routes(['verify' => true]);

Route::get('/login', [AuthController::class, 'login'])->name('login');
Route::post('/login', [AuthController::class, 'postlogin']);
Route::get('/logout', [AuthController::class, 'logout'])->name('logout');

Route::get('/dashboard', [SiteController::class, 'check'])->name('home');

Route::group(['middleware' => ['auth','verified','checkrole:Admin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/verification/{user}', [AdminController::class, 'verification'])->name('admin.verification');
    Route::get('/admin/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete');
    Route::post('/admin/profile', [AdminController::class, 'update'])->name('admin.profile.edit');
    Route::post('/admin/password', [AdminController::class, 'updatePassword'])->name('admin.password.edit');
});

Route::group(['middleware' => ['auth','verified','checkrole:A']], function(){
    Route::get('/alumni/dashboard', [AlumniController::class, 'index'])->name('alumni.index');
});

Route::group(['middleware' => ['auth','verified','checkrole:M']], function(){
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.index');
});