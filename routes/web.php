<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\TaskController;
use App\Http\Controllers\TeamController;
use App\Http\Controllers\TypeController;
use App\Http\Controllers\UserController;

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
    if (auth()->check()) {
        return redirect()->route('dashboard');
    } else {
        return redirect()->route('login');
    }
});

Route::match(['GET', 'POST'], '/login', [AuthController::class, 'login'])->name('login');

Route::group(['middleware' => 'auth'], function() {
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');

    Route::group(['prefix' => '/especies', 'as' => 'types.'], function(){
        Route::get('', [TypeController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'],'/agregar-editar/{id?}', [TypeController::class, 'addEdit'])->name('form');
        Route::get('/delete/{id?}', [TypeController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => '/servicios', 'as' => 'services.'], function () {
        Route::get('', [ServiceController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'], '/agregar-editar/{id?}', [ServiceController::class, 'addEdit'])->name('form');
        Route::get('/delete/{id?}', [ServiceController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => '/cuadrillas', 'as' => 'teams.'], function () {
        Route::get('', [TeamController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'], '/agregar-editar/{id?}', [TeamController::class, 'addEdit'])->name('form');
        Route::get('/delete/{id?}', [TeamController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => '/tareas', 'as' => 'tasks.'], function () {
        Route::get('', [TaskController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'], '/agregar-editar/{id?}', [TaskController::class, 'addEdit'])->name('form');
        Route::get('/delete/{id?}', [TaskController::class, 'delete'])->name('delete');
    });

    Route::group(['prefix' => '/usuarios', 'as' => 'users.'], function () {
        Route::get('', [UserController::class, 'index'])->name('index');
        Route::match(['GET', 'POST'], '/agregar-editar/{id?}', [UserController::class, 'addEdit'])->name('form');
        Route::get('/delete/{id?}', [UserController::class, 'delete'])->name('delete');
    });

    Route::post('/logout',[AuthController::class, 'logout'])->name('logout');
});
