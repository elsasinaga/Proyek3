<?php

namespace App\Livewire\Lkpd;

use Livewire\Component;
use App\Models\ModuleLkpd;

class LkpdDetail extends Component
{
    public $isLoved = false;
    public $showNotification = false;
    public $id;
    public $lkpd;
    public $moduleLkpdId;
    public $moduleLkpd;
    public $tags = [];

    public function mount($id) 
    {
        $this->moduleLkpdId = $id;
        $this->loadModuleLkpd();
    }
    
    public function loadModuleLkpd()
    {
        $this->moduleLkpd = ModuleLkpd::with(['tags', 'collaborator', 'user'])
                                     ->findOrFail($this->moduleLkpdId);
    }

    
    

    public function showDownloadNotification()
    {
        session()->flash('notification', 'LKPD sudah diunduh');
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