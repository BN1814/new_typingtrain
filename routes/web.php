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
    Auth::routes([
        'verify' => true,
    ]);
});

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get('/test_typing_2', [App\Http\Controllers\HomeController::class, 'testTyping']);
// CLASSROOM ALL
// Route::get('/classroomAll', [UserController::class, 'classroomAll']);
// ADMIN
Route::group(['prefix' => 'admin','middleware' => ['auth', 'isAdmin', 'PreventBackHistory']], function() {
    Route::controller(AdminController::class)->group(function() {
        // ADMIN PANEL
        Route::get('/dashboard', 'index')->name('admin.dashboard');
        Route::get('/exercise_all', 'exercise_all');
        Route::get('/section_all', 'section_all');
        Route::get('/profile/{user}/edit', 'profile');
        Route::put('/profile/{user}', 'updateProfile');
        // Route::get('/changePassword/{user}', 'changePassword');
        Route::get('/settings', 'settings');
        // ADD DATA TEACHER/STUDENT AND CRUD
        Route::get('/view_data_teacher_student/{user}', 'view_dataTeachSTD');
        Route::get('/add_data_teacher_student', 'createTeachStd');
        Route::post('/dashboard', 'storeTeachStd');
        Route::get('/add_data_teacher_student/{user}/edit', 'editTeachStd');
        Route::put('/add_data_teacher_student/{user}', 'updateTeachStd');
        Route::delete('/dashboard/{id}', 'destroyTeachStd');
        // ADD EXERCISE AND CRUD
        Route::get('/add_data_exercises', 'homeExercise');
        Route::post('/add_data_exercises', 'storeExercise');
        // Route::post('/import_exercise', 'importExercise')->name('importExercise');
        Route::get('/add_data_exercises/{exercise}/edit', 'editExercise');
        Route::put('/add_data_exercises/{exercise}', 'updateExercise');
        Route::delete('/add_data_exercises/{id}', 'destroyExercise');
        // ADD SECTION AND CRUD
        Route::get('/data_section/{section}/edit', 'editSection');
        Route::put('/data_section/{section}', 'updateSection');
        Route::delete('/data_section/{id}', 'destroySection');

        // IMPORT EXCEL
    });
});
// TEACHER
Route::group(['prefix' => 'teacher', 'middleware' => ['auth', 'isTeacher', 'PreventBackHistory', 'verified']], function() {
    Route::controller(TeacherController::class)->group(function() {
        // TEACHER PANEL
        Route::get('dashboard', 'index')->name('teacher.dashboard');
        Route::get('/profile/{user}/edit', 'profile');
        Route::put('/profile/{user}', 'updateProfile');
        Route::get('/changePassword', 'changePassword');
        Route::post('/changePassword', 'changePass');
        Route::get('/settings', 'settings');
        // CRUD DATA STUDENT
        Route::get('/dataSTD/{section}', 'dataStudent');
        Route::get('/dataSTD/{id}/{user}/edit', 'editDataStudent');
        Route::put('/dataSTD/{section}/{user}', 'updateDataStudent');
        Route::delete('/dataSTD/{id}', 'destroyDataStudent');
        Route::get('/dataSTD/{id}/view_data_student/{user}', 'viewDataStudent');
        Route::get('/dataSTD/{id}/view_scores', 'viewScoreAll');
        // CLASSROOM
        Route::get('/classroom', 'Classroom');
        // Section 
        Route::get('/classroom/{section}/edit', 'editSection');
        Route::post('/createCode', 'createCode');
        Route::put('/classroom/{section}', 'updateSection');
        Route::delete('/classroom/{id}', 'destroySection');
        
        // REPORT
        // Route::post('/report', 'serachDate')->name('searchDate');

        Route::get('/test_alert', 'testAlert');
    });
});
// STUENT
Route::group(['prefix' => 'user', 'middleware' => ['auth', 'isUser', 'PreventBackHistory', 'verified']], function() {
    Route::controller(UserController::class)->group(function() {
        // STUDENT PANEL
        Route::get('/test_typing', 'testTyping');
        Route::get('/changePassword', 'changePassword');
        Route::get('/histories_score/{user}', 'History_STD');
        // STUDENT CRUD
        Route::get('/profile/{user}/edit', 'profile');
        Route::put('/profile/{user}', 'updateProfile');
        // STUDENT INPUT CLASS WITH CODE
        Route::get('/enterclass', 'enterclass')->name('user.dashboard');
        Route::post('/enterclass_std', 'enterclass_std');
        // Route::delete('/enterclass/{id}', 'destroy_enterclass');
        
        Route::get('/enterclass/homeEx/{section}/{user}', 'HExercise');
    });
    Route::controller(ExerciseController::class)->group(function(){
        // Exercise of Student form ExerciseController
        Route::get('/enterclass/homeEx/{section}/{user}/AllExercises', 'AllExercises')->name('allExercise');
        Route::get('/enterclass/homeEx/{section}/{user}/AllExercises/{id}', 'Exercise');
        //SAVE EXERCISE TO DATABASE
        Route::post('/enterclass/homeEx/{section}/{user}/AllExercises/{id}', 'saveExercise');
    });
});
