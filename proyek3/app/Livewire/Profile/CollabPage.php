<?php
namespace App\Livewire\Profile;
use App\Models\Profile;
use App\Models\Collaborator;
use Livewire\Component;

class CollabPage extends Component {
    public $profile;
    public $collaborator_name;
    public $collaborator;
    public $lkpdVerif;
    public $school;

    public function mount($collaborator_name)
    {
        $this->collaborator_name = $collaborator_name;
        $this->collaborator = Collaborator::where('collaborator_name', $this->collaborator_name)
            ->first();

        if ($this->collaborator) {
            $this->loadProfile($this->collaborator);

            $lkpd = $this->collaborator->moduleLkpds()
                ->where('verification_status', true)
                ->withCount('likes')
                ->get();

            $this->lkpdVerif = $lkpd->map(function ($item) {
                return [
                    'lkpd_id' => $item->id,
                    'lkpd_title' => $item->lkpd_title ?? 'Untitled',
                    'lkpd_image' => $item->lkpd_image,
                    'like_count' => $item->likes_count,
                ];
            })->toArray();
        } else {
            $this->profile = null;
            $this->lkpdVerif = [];
        }
    }

    public function loadProfile($collaborator)
    {
        if ($collaborator) {
            $this->profile = Profile::with('school')
                ->where('collab_id', $collaborator->id)
                ->first();
            if ($this->profile) {
                $this->school = $this->profile->school->school_name;
            } else {
                $this->school = '-';
            }
        } else {
            $this->profile = null;
            $this->school = '-';
        }
    }

    public function render()
    {
        return view('livewire.profile.collab-page-content', [
            'profile' => $this->profile,
            'lkpdVerif' => $this->lkpdVerif,
            'collaborator' => $this->collaborator,
        ]);
    }
}