<?php

use Illuminate\Support\Facades\Route;
use App\Livewire\Welcome;
use App\Livewire\RegisterForm;
use App\Livewire\LoginForm;

// Route ke halaman Welcome (beranda)
Route::get('/', Welcome::class);

// Route::get('/', function () {
//     return to_route('login');
// });

Route::group(['middleware' => 'guest'], function () {
    // Authentication
    Route::get('/login', LoginForm::class)->name('login');
    Route::get('/register', RegisterForm::class)->name('register');
});
Route::get('/logout', function () {
    Auth::logout();
    return redirect('/');
});