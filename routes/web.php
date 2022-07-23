<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\FullCalenderController;
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
    return view('auth.login');
});

Auth::routes();

Route::middleware(['auth'])->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    

    Route::resource('classrooms', App\Http\Controllers\ClassroomController::class);
    Route::resource('courses', App\Http\Controllers\CourseController::class);
    Route::resource('lectors', App\Http\Controllers\LectorController::class);
    Route::resource('registrations', App\Http\Controllers\RegistrationController::class);
    Route::resource('students', App\Http\Controllers\StudentController::class);
    Route::resource('users', App\Http\Controllers\UserController::class);

    Route::get('registration/export/', [App\Http\Controllers\RegistrationController::class, 'export'])->name('registration.export.excel');
  
    Route::get('classroom_report/report', [App\Http\Controllers\PDF\ClassroomReportController::class, 'simplePDF'])->name('classroom_report.report.simplePDF');
});