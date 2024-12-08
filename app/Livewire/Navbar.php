<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;
use App\Models\ModuleLkpd;
use Livewire\WithPagination;

class Navbar extends Component
{
    public $user;
    public $profile;
    public $search = '';
    public $searchResults = [];
    public $isSearching = false;

    protected $queryString = [
        'search' => ['except' => '']
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

    public function updatedSearch()
    {
        $this->isSearching = strlen($this->search) >= 2;
        
        if ($this->isSearching) {
            $this->searchResults = ModuleLkpd::with(['user', 'category', 'tags'])
                ->where(function ($query) {
                    // Search in title
                    $query->whereRaw('LOWER(lkpd_title) LIKE ?', ['%' . strtolower($this->search) . '%'])
                    // Search in description
                    ->orWhereRaw('LOWER(lkpd_description) LIKE ?', ['%' . strtolower($this->search) . '%'])
                    // Search by author (user name)
                    ->orWhereHas('user', function ($q) {
                        $q->whereRaw('LOWER(name) LIKE ?', ['%' . strtolower($this->search) . '%']);
                    })
                    // Search by tags
                    ->orWhereHas('tags', function ($q) {
                        $q->whereRaw('LOWER(tag_name) LIKE ?', ['%' . strtolower($this->search) . '%']);
                    });
                })
                ->limit(5)
                ->get();
        } else {
            $this->searchResults = [];
        }
    }

    public function clearSearch()
    {
        $this->search = '';
        $this->searchResults = [];
        $this->isSearching = false;
    }

    public function render()
    {
        return view('livewire.navbar', [
            'isLoggedIn' => Auth::check(),
        ]);
    }
}
