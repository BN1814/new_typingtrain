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
    // return redirect()->route('login');
    return view('homepage');
});

Route::middleware(['middleware' => 'PreventBackHistory'])->group(function () {
    Auth::routes();
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Admin
Route::group(['prefix' => 'admin', 'middleware' => ['auth', 'isAdmin', 'PreventBackHistory']], function() {
    Route::get('dashboard', [AdminController::class, 'index'])->name('admin.dashboard');
    Route::get('profile', [AdminController::class, 'profile'])->name('admin.profile');
    Route::post('profile', [AdminController::class, 'updateProfile'])->name('udProfile');
    Route::get('settings', [AdminController::class, 'settings'])->name('admin.settings');
    Route::get('add_data_teacher', [AdminController::class, 'addDataTeacher'])->name('admin.add_teacher');
    Route::get('add_data_student', [AdminController::class, 'addDataStudent'])->name('admin.add_student');
    Route::get('add_data_exercise', [AdminController::class, 'addDataExercise'])->name('admin.add_exercise');
});
// Teacher
Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'isTeacher', 'PreventBackHistory']], function() {
    Route::get('dashboard', [TeacherController::class, 'index'])->name('teacher.dashboard');
    Route::get('profile', [TeacherController::class, 'profile'])->name('teacher.profile');
    Route::get('settings', [TeacherController::class, 'settings'])->name('teacher.settings');
    Route::get('dataSTD', [TeacherController::class, 'dataStudent'])->name('teacher.dataSTD');
    Route::get('classroom', [TeacherController::class, 'Classroom'])->name('teacher.classroom');
    Route::get('editData', [TeacherController::class, 'editData'])->name('teacher.edit');

    Route::post('createCode', [TeacherController::class, 'createCode'])->name('setSection');
});
// Student
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isUser', 'PreventBackHistory']], function() {
    Route::get('dashboard', [UserController::class, 'index'])->name('user.dashboard');
    Route::get('profile', [UserController::class, 'profile'])->name('user.profile');
    Route::get('settings', [UserController::class, 'settings'])->name('user.settings');
    Route::get('enterclass', [UserController::class, 'enterclass'])->name('user.entclass');

    // Exercise of Student form ExerciseController
    // Exercise homeEnglish
    Route::get('hExEn01', [ExerciseController::class, 'HomeExEN01'])->name('hExEN01');
    Route::get('hExEn02', [ExerciseController::class, 'HomeExEN02'])->name('hExEN02');
    Route::get('hExEn03', [ExerciseController::class, 'HomeExEN03'])->name('hExEN03');
    Route::get('hExEn04', [ExerciseController::class, 'HomeExEN04'])->name('hExEN04');
    Route::get('hExEn05', [ExerciseController::class, 'HomeExEN05'])->name('hExEN05');
    // Exercise English
    //Exercise English homerow 
    Route::post('saveExercise', [ExerciseController::class, 'saveExercise'])->name('saveEx');
    Route::get('ex_FJ', [ExerciseController::class, 'EX_FJ'])->name('E-FJ');
    Route::get('ex_DK', [ExerciseController::class, 'EX_DK'])->name('E-DK');
    Route::get('ex_SL', [ExerciseController::class, 'EX_SL'])->name('E-SL');
    Route::get('ex_a', [ExerciseController::class, 'EX_a'])->name('E-a');
    Route::get('ex_GH', [ExerciseController::class, 'EX_GH'])->name('E-GH');
    Route::get('ex_shift_FJ', [ExerciseController::class, 'EX_shift_FJ'])->name('E-shift-FJ');
    Route::get('ex_shift_DK', [ExerciseController::class, 'EX_shift_DK'])->name('E-shift-DK');
    Route::get('ex_shift_SL', [ExerciseController::class, 'EX_shift_SL'])->name('E-shift-SL');
    Route::get('ex_shift_a', [ExerciseController::class, 'EX_shift_a'])->name('E-shift-a');
    Route::get('ex_shift_GH', [ExerciseController::class, 'EX_shift_GH'])->name('E-shift-GH');
    //Exercise English toprow
    Route::get('ex_RU', [ExerciseController::class, 'EX_RU'])->name('E-RU');
    Route::get('ex_EI', [ExerciseController::class, 'EX_EI'])->name('E-EI');
    Route::get('ex_WO', [ExerciseController::class, 'EX_WO'])->name('E-WO');
    Route::get('ex_QY', [ExerciseController::class, 'EX_QY'])->name('E-QY');
    Route::get('ex_TP', [ExerciseController::class, 'EX_TP'])->name('E-TP');
    Route::get('ex_shift_RU', [ExerciseController::class, 'EX_shift_RU'])->name('E-shift-RU');
    Route::get('ex_shift_EI', [ExerciseController::class, 'EX_shift_EI'])->name('E-shift-EI');
    Route::get('ex_shift_WO', [ExerciseController::class, 'EX_shift_WO'])->name('E-shift-WO');
    Route::get('ex_shift_QY', [ExerciseController::class, 'EX_shift_QY'])->name('E-shift-QY');
    Route::get('ex_shift_TP', [ExerciseController::class, 'EX_shift_TP'])->name('E-shift-TP');
    //Exercise English bottomrow
    Route::get('ex_VM', [ExerciseController::class, 'EX_VM'])->name('E-VM');
    Route::get('ex_C', [ExerciseController::class, 'EX_C'])->name('E-C');
    Route::get('ex_X', [ExerciseController::class, 'EX_X'])->name('E-X');
    Route::get('ex_Z', [ExerciseController::class, 'EX_Z'])->name('E-Z');
    Route::get('ex_BN', [ExerciseController::class, 'EX_BN'])->name('E-BN');
    Route::get('ex_shift_VM', [ExerciseController::class, 'EX_shift_VM'])->name('E-shift-VM');
    Route::get('ex_shift_C', [ExerciseController::class, 'EX_shift_C'])->name('E-shift-C');
    Route::get('ex_shift_X', [ExerciseController::class, 'EX_shift_X'])->name('E-shift-X');
    Route::get('ex_shift_Z', [ExerciseController::class, 'EX_shift_Z'])->name('E-shift-Z');
    Route::get('ex_shift_BN', [ExerciseController::class, 'EX_shift_BN'])->name('E-shift-BN');
    //Exercise English firstrow
    Route::get('ex_47', [ExerciseController::class, 'EX_47'])->name('E-47');
    Route::get('ex_38', [ExerciseController::class, 'EX_38'])->name('E-38');
    Route::get('ex_29', [ExerciseController::class, 'EX_29'])->name('E-29');
    Route::get('ex_10', [ExerciseController::class, 'EX_10'])->name('E-10');
    Route::get('ex_56', [ExerciseController::class, 'EX_56'])->name('E-56');
});
