<?php

use App\Http\Controllers\LoginUserController;
use App\Http\Controllers\MessagesController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\PhotoController;
use App\Http\Controllers\RegisterUserController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

Route::view("/", 'welcome');

Route::view("/about_us", 'about_us');

Route::post(
    '/message/store',
    [MessagesController::class, 'store']
)
    ->name('messages.store');

Route::resource('/photos', PhotoController::class);

Route::delete('/photos/{photo}', [PhotoController::class, 'destroy'])->name('photos.destroy');

Route::resource('/users', UserController::class);

Route::get('/register', [RegisterUserController::class, 'register'])->name('register');

Route::post('/register', [RegisterUserController::class, 'store'])->name('register.store');

Route::get('/login', [LoginUserController::class, 'login'])->name('login');

Route::post('/login', [LoginUserController::class, 'store'])->name('login.store');

Route::post('/logout', [LoginUserController::class, 'logout'])->name('logout');
