<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsersController;
use App\Http\Controllers\BroadcastNewsController;

Route::get('/', function () {
    return view('auth.login');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// specify the routes for the UsersController and BroadcastNewsController with the name of route
// Route::resource('users', UsersController::class)->names('users');
// Route::resource('broadcast', BroadcastNewsController::class)->names('broadcast');

Route::get('/users', [App\Http\Controllers\UsersController::class, 'index'])->name('users.index');
Route::get('/users/create', [App\Http\Controllers\UsersController::class, 'create'])->name('users.create');
Route::post('/users', [App\Http\Controllers\UsersController::class, 'store'])->name('users.store');
Route::get('/users/{user}/edit', [App\Http\Controllers\UsersController::class, 'edit'])->name('users.edit');
Route::post('/users/{user}', [App\Http\Controllers\UsersController::class, 'update'])->name('users.update');
Route::delete('/users/{user}', [App\Http\Controllers\UsersController::class, 'destroy'])->name('users.destroy');

Route::get('/broadcast', [App\Http\Controllers\BroadcastNewsController::class, 'index'])->name('broadcast.index');
Route::get('/broadcast/create', [App\Http\Controllers\BroadcastNewsController::class, 'create'])->name('broadcast.create');
Route::post('/broadcast', [App\Http\Controllers\BroadcastNewsController::class, 'store'])->name('broadcast.store');
Route::get('/broadcast/{broadcastNews}/edit', [App\Http\Controllers\BroadcastNewsController::class, 'edit'])->name('broadcast.edit');
Route::post('/broadcast/{broadcastNews}', [App\Http\Controllers\BroadcastNewsController::class, 'update'])->name('broadcast.update');
Route::delete('/broadcast/{broadcastNews}', [App\Http\Controllers\BroadcastNewsController::class, 'destroy'])->name('broadcast.destroy');