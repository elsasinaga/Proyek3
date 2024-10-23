<?php

namespace App\Livewire\Profile;

use Livewire\Component;

class ProfilePage extends Component
{
    public $activeTab = 'lkpd';
    public $activeLkpdTab = 'upload';
    
    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }
    
    public function setLkpdTab($tab)
    {
        $this->activeLkpdTab = $tab;
    }

    public function render()
    {
        return view('livewire.profile.profile-page-content');
    }
}