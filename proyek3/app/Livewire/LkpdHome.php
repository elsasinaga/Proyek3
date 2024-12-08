<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ModuleLkpd;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class LkpdHome extends Component {
    public $pluggedModules;
    public $unpluggedModules;

    public function mount()
    {
        $pluggedCategory = Category::where('category_name', 'Plugged')->first();
        // dd($pluggedCategory);

        if ($pluggedCategory) {
            $this->pluggedModules = ModuleLkpd::where('category_id', $pluggedCategory->id)
                ->with('user')
                ->withCount('likes')
                ->orderBy('likes_count', 'desc')
                ->orderBy('created_at', 'desc')
                ->take(3) 
                ->get();
            // dd($this->pluggedModules);

            Log::info('Plugged Modules Count: ' . count($this->pluggedModules));
        } else {
            Log::warning('Plugged Category not found');
            $this->pluggedModules = [];
        }

        $unpluggedCategory = Category::where('category_name', 'Unplugged')->first();

        if ($unpluggedCategory) {
            $this->unpluggedModules = ModuleLkpd::where('category_id', $unpluggedCategory->id)
                ->with('user')
                ->withCount('likes')
                ->orderBy('likes_count', 'desc') 
                ->orderBy('created_at', 'desc')
                ->take(3)
                ->get();

            Log::info('Unplugged Modules Count: ' . count($this->unpluggedModules));
        } else {
            Log::warning('Unplugged Category not found');
            $this->unpluggedModules = [];
        }
    }

    public function render()
    {

        // dd($this->pluggedModules, $this->unpluggedModules);

        return view('livewire.lkpd-home', [
            'pluggedModules' => $this->pluggedModules,
            'unpluggedModules' => $this->unpluggedModules
        ]);
    }
}