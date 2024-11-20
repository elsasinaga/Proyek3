<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\ModuleLkpd;

class Navbar extends Component
{
    public $user;
    public $profile;
    public $search = '';

    protected $queryString = [
        'search',
    ];

    public function mount()
    {
        $this->user = User::find(2);
        if (!$this->user) {
            throw new \Exception('User tidak ditemukan');
        }

        $this->profile = $this->user->profile;
        // dd($this->profile);
    }

    public function render()
    {
        $query = ModuleLkpd::with(['user', 'category', 'tags', 'collaborator']);

        if ($this->search !== '') {
            $query->where(function ($q) {
                $q->whereRaw('LOWER(lkpd_title) LIKE ?', '%' . strtolower($this->search) . '%')
                  ->orWhereHas('tags', function ($q) {
                      $q->whereRaw('LOWER(tag_name) LIKE ?', '%' . strtolower($this->search) . '%');
                  })
                  ->orWhereHas('user', function ($q) {
                      $q->whereRaw('LOWER(name) LIKE ?', '%' . strtolower($this->search) . '%');
                  })
                  ->orWhereRaw('LOWER(lkpd_description) LIKE ?', '%' . strtolower($this->search) . '%');
            });
        }

        return view('livewire.navbar', [
            'isLoggedIn' => Auth::check(),
        ]);
    }
}
