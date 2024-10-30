<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class LkpdTab extends Component
{
    public $activeSubTab = 'upload';
    
    public function mount($activeSubTab = 'upload')
    {
        $this->activeSubTab = $activeSubTab;
    }

    public function render()
    {
        return view('livewire.profile.lkpd-tab');
    }
}