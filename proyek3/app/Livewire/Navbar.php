<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Navbar extends Component
{
    public $user;
    public $profile;

    public function mount()
    {
        $this->user = User::find(2);
        if (!$this->user) {
            throw new \Exception('User tidak ditemukan');
        }

        $this->profile = $this->user->profile;
    }

    public function render()
    {
        return view('livewire.navbar', [
            'isLoggedIn' => Auth::check(),
        ]);
    }
}
