<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\User;

class FavoritTab extends Component
{
    public $user;
    public $lkpdFavorites;

    public function mount()
    {
        $this->user = User::find(2);
        $lkpd = $this->user->likedLkpd()->withCount('likes')->get();

        $this->lkpdFavorites = $lkpd->map(function ($item) {
            return [
                'lkpd_id' => $item->id,
                'lkpd_title' => $item->lkpd_title ?? 'Untitled',
                'lkpd_image' => $item->lkpd_image,
                'like_count' => $item->likes_count, 
                // Tambahkan field lain yang diperlukan
            ];
        })->toArray();
    }

    public function render()
    {
        return view('livewire.profile.favorit-tab', [
            'favorites' => $this->lkpdFavorites,
        ]);
    }
}
