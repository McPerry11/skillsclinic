<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TasksController;

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

Route::get('login', [LoginController::class, 'view'])->name('login');
Route::post('login', [LoginController::class, 'login']);
Route::any('logout', [LoginController::class, 'logout']);

Route::middleware(['auth'])->group(function() {
    Route::get('', [TasksController::class, 'index']);
    Route::post('create', [TasksController::class, 'store']);
    Route::post('edit/{id}', [TasksController::class, 'edit']);
    Route::post('update/{id}', [TasksController::class, 'update']);
    Route::post('delete/{id}', [TasksController::class, 'destroy']);
});