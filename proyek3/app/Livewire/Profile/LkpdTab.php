<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\User;

class LkpdTab extends Component
{
    public $user;
    public $lkpd;
    public $lkpdVerif;

    public $activeSubTab = 'upload';
    
    public function mount($activeSubTab = 'upload')
    {
        $this->activeSubTab = $activeSubTab;
        $this->user = User::find(2);
        // dd($this->user->moduleLkpd()->get());
        
        $lkpd = $this->user->moduleLkpd()->withCount('likes')->get();
        // dd($lkpd);
        $this->lkpdVerif = [
            'upload' => $lkpd->where('verification_status', true)->values()->map(function($item) {
                return [
                    'lkpd_id' => $item->id,
                    'lkpd_title' => $item->lkpd_title ?? 'Untitled',
                    'lkpd_image' => $item->lkpd_image,
                    'like_count' => $item->likes_count, 
                    // tambahkan field lain yang dibutuhkan
                    ];
            })->toArray(),
            'draft' => $lkpd->where('verification_status', false)->values()->map(function($item) {
                return [
                    'lkpd_id' => $item->id,
                    'lkpd_title' => $item->lkpd_title ?? 'Untitled', 
                    'lkpd_image' => $item->lkpd_image,
                    'like_count' => $item->likes_count, 
                    // tambahkan field lain yang dibutuhkan
                ];
            })->toArray(),
        ];
    }

    public function render()
    {
        return view('livewire.profile.lkpd-tab');   
    }
}