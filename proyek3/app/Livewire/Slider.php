<?php

namespace App\Livewire;

use Livewire\Component;

class Slider extends Component
{
    public $currentIndex = 0;
    public $totalSlides = 3;

    public function nextSlide()
    {
        $this->currentIndex = ($this->currentIndex + 1) % $this->totalSlides;
    }

    public function prevSlide()
    {
        $this->currentIndex = ($this->currentIndex - 1 + $this->totalSlides) % $this->totalSlides;
    }

    public function render()
    {
        return view('livewire.slider');
    }
}
