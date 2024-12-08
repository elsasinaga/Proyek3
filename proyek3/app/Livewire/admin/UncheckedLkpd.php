<?php

namespace App\Livewire\Admin    ;

use Illuminate\Contracts\View\View;
use Livewire\Component;
use App\Models\ModuleLkpd;
use Database\Seeders\ModuleLkpdSeeder;
use Livewire\WithPagination;

class UncheckedLkpd extends Component
{
    use WithPagination;
    public $dataLkpd;
    public bool $viewLkpd = false;
    public $selectedLkpd;

    public function mount()
    {
        // Ambil data LKPD dari database
        $this->dataLkpd = ModuleLkpd::where('verification_status', false)->get();
    }

    public function openLkpdModal($id)
    {
        $this->selectedLkpd = ModuleLkpd::find($id); // Ambil data LKPD berdasarkan ID
        // dd($this->selectedLkpd);
        $this->viewLkpd = true; // Buka modal
    }

    public function verifyLkpd($id)
    {
        $lkpd = ModuleLkpd::find($id);

        if ($lkpd){
            $lkpd->verification_status = true;
            $lkpd->save();
        }
        $this->mount();
        return redirect()->to('/admin/dashboard');
    }

    public function deleteData($id)
    {
        $lkpd = ModuleLkpd::find($id);
        $lkpd->delete();

        $this->dataLkpd = ModuleLkpd::all();
        return redirect()->to('/admin/dashboard');
    }

    public function render(): View 
    {
        return view('livewire.admin.uncheckedLkpd', [
            'lkpd' => ModuleLkpd::all(),
        ]);
    }

}