<?php
namespace App\Livewire;
use Livewire\Component;
use App\Models\ModuleLkpd;

class Slider extends Component
{
    public $currentIndex = 0;
    public $lkpdSlides;
    public $totalSlides = 0; // Initialize with 0

    public function mount()
    {
        $this->lkpdSlides = ModuleLkpd::with(['user', 'category'])
            ->take(3)
            ->get();
        
        $this->totalSlides = $this->lkpdSlides->count(); 
    }

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