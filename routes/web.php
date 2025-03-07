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



/* Créations des routes automatiques */

Route::resource('students', StudentController::class)->names([
    'index' => 'student.index',
    'create' => 'student.create',
    'store' => 'student.store',
    'show' => 'student.show',
    'edit' => 'student.edit',
    'update' => 'student.update',
    'destroy' => 'student.destroy',
]);


Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/student/{student}', [StudentController::class, 'edit'])->name('students.edit');

Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('students.destroy');

Route::post('/create/student', [StudentController::class, 'store'])->name('students.store');
