<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ModuleLkpd;

class LkpdDetail extends Component
{
    public $lkpd, $detail, $selectedLkpd;

    public function mount()
    {
        // Memuat data awal
        $this->lkpd = ModuleLkpd::all();
    }

    // public function detailLkpd($id)
    // {
    //     // Memuat detail dengan relasi
    //     $this->detail = ModuleLkpd::with('user')->findOrFail($id);
    // }

        public function selectLkpd($id)
    {
        // Mengatur LKPD yang dipilih dan memuat detailnya
        $this->selectedLkpd = $id;
        $this->detail = ModuleLkpd::with('user')->findOrFail($id);
    }

    public function render()
    {
        return view('livewire.admin.lkpd-detail', [
            'selectedDetail' => $this->detail,
        ]);
    }
}
