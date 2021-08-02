<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;

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
    Route::get('/admin/dashboard', [SiteController::class, 'adminDashboard'])->name('admin.index');
    Route::post('/admin/profile', [AdminController::class, 'update'])->name('admin.profile.edit');
});