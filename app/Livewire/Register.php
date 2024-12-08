<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\Support\Facades\Hash;
use App\Models\User;
use Illuminate\Validation\Rule;

class Register extends Component
{
    public $username;
    public $email;
    public $password;
    public $password_confirmation;

    // Rules untuk validasi form
    protected $rules = [
        'username' => 'required|string|min:3|max:255|unique:users,username',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:6|confirmed',
    ];

    public function updated($propertyName)
    {
        $this->validateOnly($propertyName);
    }

    public function register()
    {
        // Validasi semua input
        $validatedData = $this->validate();

        // Membuat pengguna baru
        User::create([
            'username' => $validatedData['username'],
            'email' => $validatedData['email'],
            'password' => Hash::make($validatedData['password']),
        ]);

        // Redirect atau set message success
        session()->flash('message', 'Registrasi berhasil! Silakan login.');

        return redirect()->route('login');
    }

    public function render()
    {
        return view('livewire.register-form');
    }
}
