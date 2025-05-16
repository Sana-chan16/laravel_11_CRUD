<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\AppUserController;
use App\Http\Middleware;

Route::get('/', function () {
    return view('welcome');
});




Route::get('/login', [AppUserController::class, 'showLoginForm'])->name('login');
Route::post('/login', [AppUserController::class, 'login']);
Route::get('/register', [AppUserController::class, 'showRegisterForm'])->name('register');
Route::post('/register', [AppUserController::class, 'register']);




    Route::resource('products', ProductController::class);
Route::post('/logout', function () {
    Auth::logout();
    session()->flush(); // Clear the session
    return redirect('/login')->with('success', 'You have been logged out.');
})->name('logout');


