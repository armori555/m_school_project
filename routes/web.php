<?php
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::prefix('languages')->group(function(){
Route::get('/', [LanguageController::class, "index"])->name("languages.index");
Route::get('/create', [LanguageController::class, "create"])->name("languages.create");
Route::post('/store', [LanguageController::class, "store"])->name("languages.store");
Route::get('/{laguage}', [LanguageController::class, "edit"])->name("languages.edit");
Route::put('/{laguage}', [LanguageController::class, "update"])->name("languages.update");
Route::delete('/{laguage}', [LanguageController::class, "destroy"])->name("languages.destroy");
    });

     Route::prefix('teachers')->group(function(){
Route::get('/', [TeacherController::class, "index"])->name("teachers.index");
Route::get('/create', [TeacherController::class, "create"])->name("teachers.create");
Route::post('/store', [TeacherController::class, "store"])->name("teachers.store");
Route::get('/{laguage}', [TeacherController::class, "edit"])->name("teachers.edit");
Route::put('/{laguage}', [TeacherController::class, "update"])->name("teachers.update");
Route::delete('/{laguage}', [TeacherController::class, "destroy"])->name("teachers.destroy");
    });

     Route::prefix('groups')->group(function(){
Route::get('/', [GroupController::class, "index"])->name("groups.index");
Route::get('/create', [GroupController::class, "create"])->name("groups.create");
Route::post('/store', [GroupController::class, "store"])->name("groups.store");
Route::get('/{laguage}', [GroupController::class, "edit"])->name("groups.edit");
Route::put('/{laguage}', [GroupController::class, "update"])->name("groups.update");
Route::delete('/{laguage}', [GroupController::class, "destroy"])->name("groups.destroy");
    });

     Route::prefix('students')->group(function(){
Route::get('/', [StudentController::class, "index"])->name("students.index");
Route::get('/create', [StudentController::class, "create"])->name("students.create");
Route::post('/store', [StudentController::class, "store"])->name("students.store");
Route::get('/{laguage}', [StudentController::class, "edit"])->name("students.edit");
Route::put('/{laguage}', [StudentController::class, "update"])->name("students.update");
Route::delete('/{laguage}', [StudentController::class, "destroy"])->name("students.destroy");
    });
