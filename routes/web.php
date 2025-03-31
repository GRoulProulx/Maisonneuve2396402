<?php

use App\Http\Controllers\StudentController;
use App\Http\Controllers\SetLocaleController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\UserController;
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


// STUDENTS
Route::get('/student', [StudentController::class, 'index'])->name('student.index');
Route::get('/student/{student}', [StudentController::class, 'show'])->name('student.show');
Route::get('/create/student', [StudentController::class, 'create'])->name('student.create');
Route::get('/student/student/{student}', [StudentController::class, 'edit'])->name('student.edit');
Route::put('/student/{student}', [StudentController::class, 'update'])->name('student.update');
Route::delete('/student/{student}', [StudentController::class, 'destroy'])->name('student.destroy');
Route::post('/create/student', [StudentController::class, 'store'])->name('student.store');

// LANGUAGES
Route::get('/language/{locale}', [SetLocaleController::class, 'index'])->name('language');


// LOGIN
Route::get('/login', [AuthController::class, 'create'])->name('login');
Route::post('/login', [AuthController::class, 'store'])->name('login.store');
Route::get('/logout', [AuthController::class, 'destroy'])->name('logout');



// REGISTER
Route::get('/users', [UserController::class, 'index'])->name('user.index');
Route::get('/register', [UserController::class, 'create'])->name('user.create');
Route::post('/register', [UserController::class, 'store'])->name('user.store');
Route::get('/edit/user/{user}', [UserController::class, 'edit'])->name('user.edit');
Route::put('/edit/user/{user}', [UserController::class, 'update'])->name('user.update');
Route::delete('/delete/user/{user}', [UserController::class, 'destroy'])->name('user.destroy');
