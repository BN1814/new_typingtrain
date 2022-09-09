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

// ADMIN
Route::group(['prefix' => 'admin','middleware' => ['auth', 'isAdmin', 'PreventBackHistory']], function() {
    Route::controller(AdminController::class)->group(function() {
        // ADMIN PANEL
        Route::get('/dashboard', 'index');
        Route::get('/profile/{user}/edit', 'profile');
        Route::put('/profile/{user}', 'updateProfile');
        Route::get('/changePassword/{user}', 'changePassword');
        Route::get('/settings', 'settings');
        // ADD DATA TEACHER/STUDENT AND CRUD
        Route::get('/view_data_teacher_student/{user}', 'view_dataTeachSTD');
        Route::get('/add_data_teacher_student', 'createTeachStd');
        Route::post('/dashboard', 'storeTeachStd');
        Route::get('/add_data_teacher_student/{user}/edit', 'editTeachStd');
        Route::put('/add_data_teacher_student/{user}', 'updateTeachStd');
        Route::delete('/dashboard/{user}', 'destroyTeachStd');
        // ADD EXERCISE AND CRUD
        Route::get('/add_data_exercises', 'homeExercise');
        Route::post('/add_data_exercises', 'storeExercise');
        Route::get('/add_data_exercises/{exercise}/edit', 'editExercise');
        Route::put('/add_data_exercises/{exercise}', 'updateExercise');
        Route::delete('/add_data_exercises/{exercise}', 'destroyExercise');
        // ADD SECTION AND CRUD
        Route::get('/data_section/{section}/edit', 'editSection');
        Route::put('/data_section/{section}', 'updateSection');
        Route::delete('/data_section/{section}', 'destroySection');
    });
});
// TEACHER
Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'isTeacher', 'PreventBackHistory']], function() {
    Route::controller(TeacherController::class)->group(function() {
        // TEACHER PANEL
        Route::get('dashboard', 'index')->name('teacher.dashboard');
        Route::get('/profile/{user}/edit', 'profile');
        Route::put('/profile/{user}', 'updateProfile');
        Route::get('/changePassword', 'changePassword'); 
        Route::get('/settings', 'settings');
        // CRUD DATA STUDENT
        Route::get('/view_data_student/{user}', 'viewDataStudent');
        Route::get('/dataSTD', 'dataStudent');
        Route::get('/dataSTD/{user}/edit', 'editDataStudent');
        Route::put('/dataSTD/{user}', 'updateDataStudent');
        Route::delete('/dataSTD/{user}', 'destroyDataStudent');
        // CLASSROOM
        Route::get('/classroom', 'Classroom');
        // Section 
        Route::get('/classroom/{section}/edit', 'editSection');
        Route::post('/createCode', 'createCode');
        Route::put('/classroom/{section}', 'updateSection');
        Route::delete('/classroom/{section}', 'destroySection');
    });
});
// STUENT
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isUser', 'PreventBackHistory']], function() {
    Route::controller(UserController::class)->group(function() {
        // STUDENT PANEL
        Route::get('/dashboard', 'index');
        Route::get('/settings', 'settings');
        Route::get('/changePassword', 'changePassword');
        // STUDENT CRUD
        Route::get('/profile/{user}/edit', 'profile');
        Route::put('/profile/{user}', 'updateProfile');
        // STUDENT INPUT CLASS WITH CODE
        Route::get('/enterclass', 'enterclass');
    });
    Route::controller(ExerciseController::class)->group(function(){
        // Exercise of Student form ExerciseController
        Route::get('HomeExercises', 'HomeExercises')->name('HomeExercises');
        Route::get('/HomeExercises/{exercise}/ExercisePage', 'Exercise');


        //Exercise English homerow 
        Route::post('saveExercise', 'saveExercise')->name('saveEx');
        Route::get('ex_FJ', 'EX_FJ')->name('E-FJ');
        Route::get('ex_DK', 'EX_DK')->name('E-DK');
        Route::get('ex_SL', 'EX_SL')->name('E-SL');
        Route::get('ex_a', 'EX_a')->name('E-a');
        Route::get('ex_GH', 'EX_GH')->name('E-GH');
        Route::get('ex_shift_FJ', 'EX_shift_FJ')->name('E-shift-FJ');
        Route::get('ex_shift_DK', 'EX_shift_DK')->name('E-shift-DK');
        Route::get('ex_shift_SL', 'EX_shift_SL')->name('E-shift-SL');
        Route::get('ex_shift_a', 'EX_shift_a')->name('E-shift-a');
        Route::get('ex_shift_GH', 'EX_shift_GH')->name('E-shift-GH');

        //Exercise English toprow
        Route::get('ex_RU', 'EX_RU')->name('E-RU');
        Route::get('ex_EI', 'EX_EI')->name('E-EI');
        Route::get('ex_WO', 'EX_WO')->name('E-WO');
        Route::get('ex_QY', 'EX_QY')->name('E-QY');
        Route::get('ex_TP', 'EX_TP')->name('E-TP');
        Route::get('ex_shift_RU', 'EX_shift_RU')->name('E-shift-RU');
        Route::get('ex_shift_EI', 'EX_shift_EI')->name('E-shift-EI');
        Route::get('ex_shift_WO', 'EX_shift_WO')->name('E-shift-WO');
        Route::get('ex_shift_QY', 'EX_shift_QY')->name('E-shift-QY');
        Route::get('ex_shift_TP', 'EX_shift_TP')->name('E-shift-TP');

        //Exercise English bottomrow
        Route::get('ex_VM', 'EX_VM')->name('E-VM');
        Route::get('ex_C', 'EX_C')->name('E-C');
        Route::get('ex_X', 'EX_X')->name('E-X');
        Route::get('ex_Z', 'EX_Z')->name('E-Z');
        Route::get('ex_BN', 'EX_BN')->name('E-BN');
        Route::get('ex_shift_VM', 'EX_shift_VM')->name('E-shift-VM');
        Route::get('ex_shift_C', 'EX_shift_C')->name('E-shift-C');
        Route::get('ex_shift_X', 'EX_shift_X')->name('E-shift-X');
        Route::get('ex_shift_Z', 'EX_shift_Z')->name('E-shift-Z');
        Route::get('ex_shift_BN', 'EX_shift_BN')->name('E-shift-BN');

        //Exercise English firstrow
        Route::get('ex_47', 'EX_47')->name('E-47');
        Route::get('ex_38', 'EX_38')->name('E-38');
        Route::get('ex_29', 'EX_29')->name('E-29');
        Route::get('ex_10', 'EX_10')->name('E-10');
        Route::get('ex_56', 'EX_56')->name('E-56');
    });
});
