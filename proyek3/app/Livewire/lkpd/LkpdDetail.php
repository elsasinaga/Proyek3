<?php

namespace App\Livewire\Lkpd;

use Livewire\Component;
use App\Models\ModuleLkpd;
use App\Models\User;

class LkpdDetail extends Component
{
    public $isLoved = false;
    public $showNotification = false;
    public $moduleLkpdId;
    public $moduleLkpd;
    public $user;

    public function mount($id) 
    {
        $this->user = User::find(2); // Definisikan user secara eksplisit
        $this->moduleLkpdId = $id;
        $this->checkIsLoved();
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

    public function checkIsLoved()
    {
        $this->isLoved = ModuleLkpd::find($this->moduleLkpdId)
            ->likes()
            ->where('user_id', $this->user->id)
            ->exists();
    }
    
    public function toggleLove()
    {
        if ($this->isLoved) {
            // Remove like
            $this->moduleLkpd->likes()->detach($this->user->id);
            $this->isLoved = false;
        } else {
            // Add like
            $this->moduleLkpd->likes()->attach($this->user->id);
            $this->isLoved = true;
        }
    }

    public function render()
    {
        $collaboratorNames = $this->moduleLkpd->collaborator->pluck('collaborator_name')->toArray();
        $collaboratorString = implode(', ', $collaboratorNames);

        return view('livewire.lkpd.lkpd-detail', [
            'collaboratorString' => $collaboratorString,
        ]);
    }
}
