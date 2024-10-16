<?php

namespace App\Livewire;

use Livewire\Component;

class Tags extends Component
{
    public $tags = [];
    public $newTag = '';

    public function addTag()
    {
        if (! in_array($this->newTag, $this->tags) && $this->newTag !== '') {
            $this->tags[] = $this->newTag;
            $this->newTag = ''; // Bersihkan input setelah tag ditambahkan
        }
    }
    public function render()
    {
        return view('livewire.tags');
    }
}
