<?php

namespace App\Livewire\Lkpd;

use Livewire\Component;
use App\Models\ModuleLkpd;
use Illuminate\Support\Facades\DB;

class LkpdDetail extends Component
{
    public $isLoved = false;
    public $showNotification = false;
    public $lkpd;
    public $steps = [];
    public $tags = [];
    public $currentLkpdId = 1; // Default ID untuk testing
    public $collaborators = [];

    public function mount($id = null)
    {
        // Set ID LKPD dari parameter atau gunakan default
        $this->currentLkpdId = $id ?? $this->currentLkpdId;
        $this->loadLkpd();
    }

    private function loadLkpd()
    {
        // Ambil data LKPD dengan relasi
        $this->lkpd = ModuleLkpd::with(['user', 'category', 'lkpdSteps', 'collaborator'])->find($this->currentLkpdId);
        $this->tags = $this->lkpd ? $this->lkpd->tags : collect();

        if ($this->lkpd) {
            $this->steps = $this->lkpd->lkpdSteps ?? [];
            // $this->tags = $this->lkpd->tags ? $this->lkpd->tags->map(function($tag) {
            //     return [
            //         'id' => $tag->id,
            //         'name' => $tag->tag_name,
            //         'category_id' => $tag->category_id
            //     ];
            // })->all() : [];
            $this->collaborators = array_map('trim', explode(',', $this->lkpd->kolaborasi ?? ''));
        } else {
            $this->dispatchBrowserEvent('notification', [
                'type' => 'error',
                'message' => 'Data LKPD tidak ditemukan'
            ]);
        }
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
        return view('livewire.lkpd.lkpd-detail', [
            'tags' => $this->tags,
            'steps' => $this->steps,
            'collaborators' => $this->collaborators
        ]);
    }
}
