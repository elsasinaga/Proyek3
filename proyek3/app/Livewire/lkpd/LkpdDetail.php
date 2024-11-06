<?php

namespace App\Livewire\lkpd;

use Livewire\Component;

class LkpdDetail extends Component
{
    public $isLoved = false; // Inisialisasi variabel dengan nilai default

    public function toggleLove()
    {
        $this->isLoved = !$this->isLoved; // Toggle nilai variabel saat tombol diklik
    }
    
    public function render()
    {
        return view('livewire.lkpd.lkpd-detail');
    }
}