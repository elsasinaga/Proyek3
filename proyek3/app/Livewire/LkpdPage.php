<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ModuleLkpd;
use App\Models\Category;

class LkpdPage extends Component
{
    public function render()
    {
        return view('livewire.lkpd-page');
    }
}
