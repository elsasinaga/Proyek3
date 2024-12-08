<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\School;
class AdminSekolah extends Component
{
    public $sekolah;

    public function mount(){
        $this->sekolah = School::all();
    }
    public function render()
    {
        return view('livewire.admin.admin-sekolah');
    }
}
