<?php

use App\Http\Controllers\GroupController;
use App\Http\Controllers\LectureController;
use App\Http\Controllers\StudentController;
use App\Http\Controllers\ThemeController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::get('/students', [StudentController::class, 'index'])->name('students.index');
Route::get('/students/{student}', [StudentController::class, 'show'])->name('students.show');
Route::post('/students', [StudentController::class, 'store'])->name('students.store');
Route::patch('/students/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/students/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::get('/groups', [GroupController::class, 'index'])->name('groups.index');
Route::get('/groups/{group}', [GroupController::class, 'show'])->name('groups.show');
Route::get('/syllabus/{group}', [GroupController::class, 'showSyllabus'])->name('syllabus.show');
Route::post('/groups', [GroupController::class, 'store'])->name('groups.store');
Route::patch('/groups/{group}', [GroupController::class, 'update'])->name('groups.update');
Route::delete('/groups/{group}', [GroupController::class, 'destroy'])->name('groups.destroy');

Route::get('/themes', [ThemeController::class, 'index'])->name('themes.index');
Route::get('/themes/{theme}', [ThemeController::class, 'show'])->name('themes.show');
Route::post('/themes', [ThemeController::class, 'store'])->name('themes.store');
Route::patch('/themes/{theme}', [ThemeController::class, 'update'])->name('themes.update');
Route::delete('/themes/{theme}', [ThemeController::class, 'destroy'])->name('themes.destroy');
