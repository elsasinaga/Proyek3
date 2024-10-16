<?php

namespace App\Livewire;

use App\Models\LkpdStep;
use Livewire\Component;

class LkpdSteps extends Component
{
    public $steps = [];
    public $stepCount = 1;

    public function mount()
    {
        $this->steps = [
            ['gambarLangkah' => '', 'judulLangkah' => '', 'deskripsiLangkah' => '']
        ];
    }

    public function addStep()
    {
        $this->steps[] = [
            'gambarLangkah' => null,
            'judulLangkah' => '',
            'deskripsiLangkah' => ''
        ];
        $this->stepCount++;
    }

    public function render()
    {
        return view('livewire.lkpd-step');
    }
}