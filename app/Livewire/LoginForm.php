<?php

namespace App\Livewire;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;

class LoginForm extends Component
{
    public $username;
    public $password;

    // Rules untuk validasi form
    protected $rules = [
        'username' => 'required|string',
        'password' => 'required|string',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function login()
    {
        // Validasi input
        $this->validate();

        // Proses login dengan Auth
        if (Auth::attempt(['username' => $this->username, 'password' => $this->password])) {
            // Jika login berhasil, redirect ke dashboard atau halaman lain
            session()->flash('message', 'Login berhasil!');
            return redirect()->intended('/');
        } else {
            // Jika gagal, berikan error message
            session()->flash('error', 'Nama pengguna atau password salah.');
        }
    }

    public function render()
    {
        return view('livewire.login-form');
    }
}

