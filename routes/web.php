<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\SiteController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AlumniController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\UploadController;
use App\Http\Controllers\RequestController;

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

Route::group(['middleware' => ['auth','verified','checkrole:A,M,Admin']], function(){
    Route::post('/user/crop', [UploadController::class, 'crop'])->name('user.crop');
});

Route::group(['middleware' => ['auth','verified','checkrole:A,M']], function(){
    Route::get('/student/request/database', [RequestController::class, 'studentRequest'])->name('student.request');
    Route::get('/alumni/request/database', [RequestController::class, 'alumniRequest'])->name('alumni.request');
    Route::post('/student/request/database', [RequestController::class, 'addStudentRequest'])->name('request.student.post');
    Route::post('/alumni/request/database', [RequestController::class, 'addAlumniRequest'])->name('request.alumni.post');
});

Route::group(['middleware' => ['auth','verified','checkrole:Admin']], function(){
    Route::get('/admin/dashboard', [AdminController::class, 'index'])->name('admin.index');
    Route::get('/admin/profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('/admin/verification/{user}', [AdminController::class, 'verification'])->name('admin.verification');
    Route::get('/admin/delete/{user}', [AdminController::class, 'deleteUser'])->name('admin.delete');
    Route::get('/admin/switch_student/{user}', [AdminController::class, 'switchStudent'])->name('admin.switch.student');
    Route::get('/admin/switch_alumni/{user}', [AdminController::class, 'switchAlumni'])->name('admin.switch.alumni');
    Route::get('/admin/database/student', [AdminController::class, 'studentData'])->name('admin.student.data');
    Route::get('/admin/database/alumni', [AdminController::class, 'alumniData'])->name('admin.alumni.data');
    Route::get('/admin/database/student/request', [AdminController::class, 'studentRequests'])->name('admin.student.request');
    Route::get('/admin/database/alumni/request', [AdminController::class, 'alumniRequests'])->name('admin.alumni.request');
    Route::post('/admin/profile', [AdminController::class, 'update'])->name('admin.profile.edit');
    Route::post('/admin/password', [AdminController::class, 'updatePassword'])->name('admin.password.edit');
    Route::post('/admin/database/student', [AdminController::class, 'studentDetail'])->name('admin.student.detail');
    Route::post('/admin/database/alumni', [AdminController::class, 'alumniDetail'])->name('admin.alumni.detail');
});

Route::group(['middleware' => ['auth','verified','checkrole:A']], function(){
    Route::get('/alumni/dashboard', [AlumniController::class, 'index'])->name('alumni.index');
    Route::get('/alumni/education/delete/{education}', [AlumniController::class, 'deleteEducation'])->name('alumni.delete.education');
    Route::get('/alumni/job/delete/{job}', [AlumniController::class, 'deleteJob'])->name('alumni.delete.job');
    Route::get('/alumni/certification/delete/{certification}', [AlumniController::class, 'deleteCtf'])->name('alumni.delete.certification');
    Route::post('/alumni/profile', [AlumniController::class, 'update'])->name('alumni.profile.update');
    Route::post('/alumni/password', [AlumniController::class, 'updatePassword'])->name('alumni.password.edit');
    Route::post('/alumni/education/add', [AlumniController::class, 'addEducation'])->name('alumni.education.add');
    Route::post('/alumni/education/update', [AlumniController::class, 'editEducation'])->name('alumni.education.edit');
    Route::post('/alumni/job/add', [AlumniController::class, 'addJob'])->name('alumni.job.add');
    Route::post('/alumni/job/update', [AlumniController::class, 'editJob'])->name('alumni.job.edit');
    Route::post('/alumni/certification/add', [AlumniController::class, 'addCertification'])->name('alumni.certification.add');
    Route::post('/alumni/certification/update', [AlumniController::class, 'editCertification'])->name('alumni.certification.edit');
});

Route::group(['middleware' => ['auth','verified','checkrole:M']], function(){
    Route::get('/student/dashboard', [StudentController::class, 'index'])->name('student.index');
    Route::get('/student/organization/delete/{organization}', [StudentController::class, 'deleteOrganization'])->name('student.delete.organization');
    Route::get('/student/committee/delete/{committee}', [StudentController::class, 'deleteCommittee'])->name('student.delete.committee');
    Route::get('/student/seminar/delete/{seminar}', [StudentController::class, 'deleteSeminar'])->name('student.delete.seminar');
    Route::get('/student/achievment/delete/{achievment}', [StudentController::class, 'deleteAchievment'])->name('student.delete.achievment');
    Route::post('/student/profile', [StudentController::class, 'update'])->name('student.profile.update');
    Route::post('/student/password', [StudentController::class, 'updatePassword'])->name('student.password.edit');
    Route::post('/student/organization/add', [StudentController::class, 'addOrganization'])->name('student.organization.add');
    Route::post('/student/organization/update', [StudentController::class, 'editOrganization'])->name('student.organization.edit');
    Route::post('/student/committee/add', [StudentController::class, 'addCommittee'])->name('student.committee.add');
    Route::post('/student/committee/update', [StudentController::class, 'editCommittee'])->name('student.committee.edit');
    Route::post('/student/seminar/add', [StudentController::class, 'addSeminar'])->name('student.seminar.add');
    Route::post('/student/seminar/update', [StudentController::class, 'editSeminar'])->name('student.seminar.edit');
    Route::post('/student/achievment/add', [StudentController::class, 'addAchievment'])->name('student.achievment.add');
    Route::post('/student/achievment/update', [StudentController::class, 'editAchievment'])->name('student.achievment.edit');
});