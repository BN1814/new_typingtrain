<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Response;

use App\Http\Controllers\AdminController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ExerciseController;

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

Route::get('/', function () {
    // if(Auth::user()->$role == 1){
    //     return redirect()->route('admin.dashboard');
    // }
    // else if(Auth::user()->role == 2){
    //     return redirect()->route('teacher.dashboard');
    // }
    // else {
    //     return redirect()->route('user.dashboard');
    // }
    return redirect()->route('login');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin', 'PreventBackHistory']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('add_data_teacher', [AdminController::class, 'addDataTeacher'])->name('admin.add_teacher');
    Route::get('add_data_student', [AdminController::class, 'addDataStudent'])->name('admin.add_student');
    Route::get('add_data_exercise', [AdminController::class, 'addDataExercise'])->name('admin.add_exercise');
});

Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'isTeacher', 'PreventBackHistory']], function() {
    Route::get('dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::get('settings', [TeacherController::class, 'settings'])->name('teacher.settings');
    Route::get('dataSTD', [TeacherController::class, 'dataStudent'])->name('teacher.dataSTD');

    Route::post('createCode', [TeacherController::class, 'createCode'])->name('setDeadline');
});

Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isUser', 'PreventBackHistory']], function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');

    // Exercise of Student
    Route::get('hExEn', [ExerciseController::class, 'HomeExEN'])->name('hExEN');
    Route::get('hExTh', [ExerciseController::class, 'HomeExTh'])->name('hExTH');
    Route::get('hExTh02', [ExerciseController::class, 'HomeExTh02'])->name('hExTH02');
    Route::get('hExTh03', [ExerciseController::class, 'HomeExTh03'])->name('hExTH03');
    Route::get('ex_FJ', [ExerciseController::class, 'EX_FJ'])->name('E-FJ');
    Route::get('ex_DK', [ExerciseController::class, 'EX_DK'])->name('E-DK');
    Route::get('ex_SL', [ExerciseController::class, 'EX_SL'])->name('E-SL');
    Route::get('test02', [ExerciseController::class, 'EX_TEST02'])->name('TEST02');
});


// ExerciseController
