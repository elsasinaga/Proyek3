<?php

namespace App\Livewire\lkpd;

use Livewire\Component;


class LkpdDetail extends Component
{
    public $isLoved = false;
    public $showNotification = false; 
    #[On('refresh-love')]
    public function toggleLove()
    {
        $this->isLoved = !$this->isLoved;
        $this->dispatch('loved-updated');
    }
    
    public function showDownloadNotification()
    {
        // Tampilkan notifikasi sementara dengan session flash
        session()->flash('notification', 'LKPD sudah di download');
    
        // Tetapkan properti untuk menampilkan elemen
        $this->showNotification = true;
    }
    
    public function hideNotification()
    {
        $this->showNotification = false;
    
    }
    public function render()
    {
        return view('livewire.lkpd.lkpd-detail');
    }


}