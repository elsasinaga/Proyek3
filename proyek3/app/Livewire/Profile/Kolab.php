<?php

namespace App\Livewire\Profile;

use App\Models\Profile;
use Livewire\Component;

class Kolab extends Component {
    // public $profile;
    // public $collaborator_name;
    // public $lkpdVerif;

    // public function mount($collaborator_name)
    // {
    //     $this->collaborator_name = $collaborator_name;
    //     $this->loadProfile();

    //     $lkpd = $this->profile->user->moduleLkpd()->withCount('likes')->get();
        
    //     $this->lkpdVerif = $lkpd->where('verification_status', true)->values()->map(function ($item) {
    //         return [
    //             'lkpd_id' => $item->id,
    //             'lkpd_title' => $item->lkpd_title ?? 'Untitled',
    //             'lkpd_image' => $item->lkpd_image,
    //             'like_count' => $item->likes_count,
    //         ];
    //     })->toArray();
    // }

    // public function loadProfile()
    // {
    //     $this->profile = Profile::with(['school', 'user'])
    //                      ->whereHas('user.moduleLkpd', function ($query) {
    //                          $query->whereHas('collaborator', function ($q) {
    //                              $q->where('collaborator_name', $this->collaborator_name);
    //                          });
    //                      })
    //                      ->first();
    // }

    // public function render()
    // {
    //     return view('livewire.profile.collab-page-content', [
    //         'profile' => $this->profile,
    //         'lkpdVerif' => $this->lkpdVerif,
    //     ]);
    // }
}