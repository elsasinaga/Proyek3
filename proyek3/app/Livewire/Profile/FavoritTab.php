<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class FavoritTab extends Component
{
    public $user;
    public $lkpd;
    public $lkpdVerif;

    public function render()
    {
        return view('livewire.profile.favorit-tab');
    }
}