<?php

namespace App\Http\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class YourComponent extends Component
{
    public $drawer = false;
    public $search = '';

    public function logout()
    {
        // Logout pengguna
        Auth::logout();

        // Invalidate session
        session()->invalidate();
        session()->regenerateToken();

        // Redirect ke halaman login
        return redirect('/login');
    }

    public function render()
    {
        return view('livewire.welcome');
    }
}
