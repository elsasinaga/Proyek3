<?php

namespace App\Livewire\Admin;

use Livewire\Component;
use App\Models\ModuleLkpd;

class Lkpd extends Component
{
    public $dataLkpd;
    public function mount()
    {
        $this->dataLkpd = ModuleLkpd::all();
    }

    public function deleteData($id)
    {
        $lkpd = ModuleLkpd::find($id);
        $lkpd->delete();

        $this->dataLkpd = ModuleLkpd::all();
        return redirect()->to('/admin/dashboard');
    }
    
    public function render()
    {
        return view('livewire.admin.lkpd');
    }
}
