<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\CRUDController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\Auth\LoginRegisterController;

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
    return view('welcome');
});

Route::controller(LoginRegisterController::class)->group(function () {
    Route::get('/register', 'register')->name('register');
    Route::post('/store', 'store')->name('store');
    Route::get('/login', 'login')->name('login');
    Route::post('/authenticate', 'authenticate')->name('authenticate');
    Route::get('/dashboard', [DashboardController::class, 'dashboard']);
    Route::post('/logout', 'logout')->name('logout');
});

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'dashboard'])->name('dashboard');
    Route::get('/crud', [CRUDController::class, 'index'])->name('CRUD.index');
    Route::get('/crud/create', [CRUDController::class, 'create'])->name('CRUD.create');
    Route::post('/crud/store', [CRUDController::class, 'store'])->name('CRUD.store');
    Route::get('/crud/edit/{id}', [CRUDController::class, 'edit'])->name('CRUD.edit');
    Route::put('/crud/update/{id}', [CRUDController::class, 'update'])->name('CRUD.update');
    Route::delete('/crud/delete/{id}', [CRUDController::class, 'destroy'])->name('CRUD.delete');
    Route::get('/crud/show/{id}', [CRUDController::class, 'show'])->name('CRUD.show');
    Route::get('/crud/search', [CRUDController::class, 'search'])->name('CRUD.search');
    Route::get('/crud/filter', [CRUDController::class, 'filter'])->name('CRUD.filter');
    // Route::get('/crud/export', [CRUDController::class, 'export'])->name('CRUD.export');
});

