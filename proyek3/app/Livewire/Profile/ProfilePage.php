<?php

namespace App\Livewire\Profile;

use App\Models\User;
use App\Models\Profile;
use App\Models\ModuleLkpd;
use Livewire\Component;


class ProfilePage extends Component
{
    public $activeTab = 'lkpd';
    public $activeLkpdTab = 'upload';
    public $user;
    public $profile;
    public $school;
    public $lkpd;
    public $lkpdVerif;
    

    public function mount()
    {
        $this->user = User::find(2);
        if (!$this->user) {
            throw new \Exception('User tidak ditemukan');
        }

        $this->profile = $this->user->profile;
        if ($this->profile) {
            $this->school = $this->profile->school->school_name ?? '-';
        } else {
            $this->school = '-';
        }
    }

    public function setTab($tab)
    {
        $this->activeTab = $tab;
    }

    public function setLkpdTab($tab)
    {
        $this->activeLkpdTab = $tab;
    }

    public function openSettings()
    {
        return redirect()->to('/profile/edit');
    }

    public function openLkpdForm()
    {
        $this->dispatch('openLkpdForm');
    }

    public function render()
    {
        return view('livewire.profile.profile-page-content');
    }
}