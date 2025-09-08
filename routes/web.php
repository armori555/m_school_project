<?php
use App\Http\Controllers\LanguageController;
use App\Http\Controllers\TeacherController;
use App\Http\Controllers\GroupController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\StudentlanguageController;
use App\Http\Controllers\PaymentController;
use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

 Route::prefix('languages')->group(function(){
Route::get('/', [LanguageController::class, "index"])->name("languages.index");
Route::get('/create', [LanguageController::class, "create"])->name("languages.create");
Route::post('/store', [LanguageController::class, "store"])->name("languages.store");
Route::get('/edit/{language}', [LanguageController::class, "edit"])->name("languages.edit");
Route::put('/{language}', [LanguageController::class, "update"])->name("languages.update");
Route::delete('/{language}', [LanguageController::class, "destroy"])->name("languages.destroy");
    });

     Route::prefix('teachers')->group(function(){
Route::get('/', [TeacherController::class, "index"])->name("teachers.index");
Route::get('/create', [TeacherController::class, "create"])->name("teachers.create");
Route::post('/store', [TeacherController::class, "store"])->name("teachers.store");
Route::get('/edit/{teacher}', [TeacherController::class, "edit"])->name("teachers.edit");
Route::put('/{teacher}', [TeacherController::class, "update"])->name("teachers.update");
Route::delete('/{teacher}', [TeacherController::class, "destroy"])->name("teachers.destroy");
    });

     Route::prefix('groups')->group(function(){
Route::get('/', [GroupController::class, "index"])->name("groups.index");
Route::get('/create', [GroupController::class, "create"])->name("groups.create");
Route::post('/store', [GroupController::class, "store"])->name("groups.store");
Route::get('/edit/{group}', [GroupController::class, "edit"])->name("groups.edit");
Route::put('/{group}', [GroupController::class, "update"])->name("groups.update");
Route::delete('/{group}', [GroupController::class, "destroy"])->name("groups.destroy");
    });

     Route::prefix('students')->group(function(){
Route::get('/', [StudentController::class, "index"])->name("students.index");
Route::get('/create', [StudentController::class, "create"])->name("students.create");
Route::post('/store', [StudentController::class, "store"])->name("students.store");
Route::get('/edit/{student}', [StudentController::class, "edit"])->name("students.edit");
Route::put('/{student}', [StudentController::class, "update"])->name("students.update");
Route::delete('/{student}', [StudentController::class, "destroy"])->name("students.destroy");
Route::get('show/{student}', [StudentController::class, "show"])->name("students.show");
    });
     Route::prefix('studentlanguages')->group(function(){
Route::get('/', [StudentlanguageController::class, "index"])->name("studentlanguages.index");
Route::get('/create', [StudentlanguageController::class, "create"])->name("studentlanguages.create");
Route::post('/store', [StudentlanguageController::class, "store"])->name("studentlanguages.store");
Route::get('/edit/{studentlanguage}', [StudentlanguageController::class, "edit"])->name("studentlanguages.edit");
Route::put('/{studentlanguage}', [StudentlanguageController::class, "update"])->name("studentlanguages.update");
Route::delete('/{studentlanguage}', [StudentlanguageController::class, "destroy"])->name("studentlanguages.destroy");
    });
     Route::prefix('payments')->group(function(){
Route::get('/', [PaymentController::class, "index"])->name("payments.index");
Route::get('/create', [PaymentController::class, "create"])->name("payments.create");
Route::post('/store', [PaymentController::class, "store"])->name("payments.store");
Route::get('/edit/{payment}', [PaymentController::class, "edit"])->name("payments.edit");
Route::put('/{payment}', [PaymentController::class, "update"])->name("payments.update");
Route::delete('/{payment}', [PaymentController::class, "destroy"])->name("payments.destroy");
Route::get('show/{payment}', [PaymentController::class, "show"])->name("payments.show");
Route::get('/calculate', [PaymentController::class, "calculate"])->name("payments.calculate");
    });
