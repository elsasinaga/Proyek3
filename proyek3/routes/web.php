<?php

use App\Livewire\Welcome;
use App\Livewire\LkpdPage;
use App\Livewire\ProfilePage;
use App\Http\Livewire\Slider;
use App\Livewire\UserProfileEdit;
use App\Livewire\ListLkpd;
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

Route::get('/', function(){
    return view('Welcome');
});

Route::get('/profile', function(){
    return view('livewire.profile.profile-page');
});

Route::get('/lkpd', function(){
    return view('livewire.lkpd.lkpd-detail-page');
});

Route::get('/home', function () {
    return view('home.homepage'); 
});