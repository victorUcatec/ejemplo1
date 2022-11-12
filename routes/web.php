<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\TeacherController;

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
    return view('welcome');
});

Route::get('/teachers', [TeacherController::class, 'index'])->name('teachers.index');

Route::get('teachers/create', [TeacherController::class, 'create'])->name('teachers.create');
Route::post('/teacher', [TeacherController::class, 'store'])->name('teachers.store');
