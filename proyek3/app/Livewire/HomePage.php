<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\ModuleLkpd;
use App\Models\Category;
use Illuminate\Support\Facades\Log;

class HomePage extends Component
{
    public $pluggedModules;
    public $unpluggedModules;

    public function mount()
    {
        // Fetch Plugged Modules
        $pluggedCategory = Category::where('category_name', 'Plugged')->first();
        dd($pluggedCategory);

        if ($pluggedCategory) {
            $this->pluggedModules = ModuleLkpd::where('category_id', $pluggedCategory->id)
                ->with('user')
                ->get();
            dd($this->pluggedModules);

            // Log the number of plugged modules for debugging
            Log::info('Plugged Modules Count: ' . count($this->pluggedModules));
        } else {
            Log::warning('Plugged Category not found');
            $this->pluggedModules = [];
        }

        // Fetch Unplugged Modules
        $unpluggedCategory = Category::where('category_name', 'Unplugged')->first();

        if ($unpluggedCategory) {
            $this->unpluggedModules = ModuleLkpd::where('category_id', $unpluggedCategory->id)
                ->with('user')
                ->get();

            // Log the number of unplugged modules for debugging
            Log::info('Unplugged Modules Count: ' . count($this->unpluggedModules));
        } else {
            Log::warning('Unplugged Category not found');
            $this->unpluggedModules = [];
        }
    }

    // public function render()
    // {

    //     dd($this->pluggedModules, $this->unpluggedModules);

    //     return view('livewire.lkpd-home', [
    //         'pluggedModules' => $this->pluggedModules,
    //         'unpluggedModules' => $this->unpluggedModules
    //     ]);
    // }
}