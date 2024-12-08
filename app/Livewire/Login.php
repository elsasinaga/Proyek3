<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Login extends Component
{
    public $email, $password;

    protected $rules = [
        'email' => 'required|email|exists:users,email',
        'password' => 'required|min:8',
    ];

    public function login()
    {
        $this->validate();
        if (Auth::attempt(['email' => $this->email, 'password' => $this->password])) {
        return redirect()->route('dashboard');
        }       
        session()->flash('error', 'Invalid credentials!');
    }

    public function render()
    {
        return view('livewire.auth.Login');
    }
}

