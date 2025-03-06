<?php

use App\Http\Controllers\StudentController;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('home');
})->name('home');


Route::get('/student', [StudentController::class, 'index'])->name('students.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('students.show');
Route::get('/create/student', [StudentController::class, 'create'])->name('students.create');
Route::get('/student/student/{student}', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/student/{student}', [StudentController::class, 'update'])->name('students.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::post('/create/student', [StudentController::class, 'store'])->name('students.store');


