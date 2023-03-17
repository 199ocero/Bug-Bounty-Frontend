<?php

use App\Http\Controllers\ReportController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\HomeController;

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

Route::group(['middleware' => ['auth_guard']], function () {
    Route::get('/', [HomeController::class, 'index'])->name('program.index');
    Route::get('program/{id}', [HomeController::class, 'show'])->name('program.show');
    Route::get('program', [HomeController::class, 'create'])->name('program.create');
    Route::post('program', [HomeController::class, 'store'])->name('program.store');
    Route::put('program/{id}', [HomeController::class, 'update'])->name('program.update');
    Route::delete('program/{id}', [HomeController::class, 'destroy'])->name('program.delete');
    Route::get('program/user/all', [HomeController::class, 'showAllByUser'])->name('program.show.all');
    Route::get('program/{program_id}/user', [HomeController::class, 'showByUser'])->name('program.show.by-user');
    Route::get('program/{program_id}/edit/user', [HomeController::class, 'showByUserEdit']);

    Route::get('report', [ReportController::class, 'index'])->name('report.index');
    Route::get('report/{id}', [ReportController::class, 'create'])->name('report.create');
    Route::post('report', [ReportController::class, 'store'])->name('report.store');
    Route::delete('report/{id}', [ReportController::class, 'destroy'])->name('report.destroy');

    Route::delete('logout', [AuthController::class, 'destroy'])->name('logout');
});

Route::group(['middleware' => ['guest_guard']], function () {
    Route::get('login', [AuthController::class, 'login'])->name('login');
    Route::post('login', [AuthController::class, 'loginStore'])->name('login.store');
    Route::get('register', [AuthController::class, 'register'])->name('register');
    Route::post('register', [AuthController::class, 'registerStore'])->name('register.store');
});