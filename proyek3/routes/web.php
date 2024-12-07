<?php

use App\Livewire\Welcome;
use App\Livewire\LkpdPage;
use App\Livewire\ProfilePage;
use App\Livewire\Profile\UserProfileEdit;
use App\Http\Livewire\Slider;
use App\Livewire\ListLkpd;
use App\Livewire\Dashboard;
use App\Livewire\LkpdDetail;
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

Route::get('/', action: function(){
    return view('Welcome');
});

Route::get('/profile', function(){
    return view('livewire.profile.profile-page');
});

Route::get('/collab/{collaborator_name}', function ($collaborator_name) {
    return view('livewire.profile.collab-page', compact('collaborator_name'));
})->name('collab');


// Route::get('/profile/edit', UserProfileEdit::class)->name('livewire.profile.edit-page');

Route::get('/profile/edit', function(){
    return view('livewire.profile.edit-page');
});

Route::get('/lkpd', function(){
    return view('livewire.list-lkpd-page');
});

Route::get('/home', function () {
    return view('home.homepage'); 
});

Route::get('/lkpd/detail', function(){
    return view('livewire.lkpd.lkpd-detail-page');
});

Route::get('/admin', function(){
    return view('livewire.admin.dashboard');
});

Route::prefix('admin')->name('admin.')->group(function(){
    Route::get('/dashboard', function(){
        return view('livewire.admin.dashboard');
    })->name('dashboard');
    Route::get('/sekolah', function(){
        return view('livewire.admin.sekolahView');
    })->name('sekolah');
    Route::get('/tags', function(){
        return view('livewire.admin.tagsView');
    })->name('tags');
    Route::get('/lkpd', function(){
        return view('livewire.admin.listLkpd');
    })->name('lkpd'); 
});

Route::get('/lkpd/{id}', LkpdDetail::class)->name('lkpd.detail');
Route::get('/lkpd/detail/{id}', function($id){
    return view('livewire.lkpd.lkpd-detail-page', ['id' => $id]);
});
