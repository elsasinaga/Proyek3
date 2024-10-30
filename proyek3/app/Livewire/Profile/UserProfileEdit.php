<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Collaborator;
use App\Models\School;
use Illuminate\Support\Facades\Hash;
use Livewire\WithFileUploads;

class UserProfileEdit extends Component
{
    use WithFileUploads;

    // User fields
    public $userId;
    public $name;
    public $username;
    public $email;
    public $currentPassword;
    public $newPassword;
    public $notification_preference;
    public $temp_notification_preference;
    public $created_at;

    // Collaborator fields
    public $collaboratorId;
    public $collaborator_name;
    public $about_me;
    public $npsn;
    public $schoolName;
    public $profile_image;
    public $temp_image;

    protected $rules = [
        // User validation
        'name' => 'required|min:3',
        'username' => 'required|min:3',
        'email' => 'required|email',
        'currentPassword' => 'nullable|min:6',
        'newPassword' => 'nullable|min:6',
        '$temp_notification_preference;' => 'required|in:none,immediate,daily',

        // Collaborator validation
        'collaborator_name' => 'required|min:3',
        'about_me' => 'nullable|string',
        'npsn' => 'required|exists:schools,npsn',
        'temp_image' => 'nullable|image|max:1024', // 1MB Max
    ];

    public function setSchoolName()
    {
        // Mengambil instance `Collaborator` terkait user
        $collaborator = Collaborator::where('user_id', $this->userId)->first();

        // Menggunakan relasi `school` pada `Collaborator` untuk mengambil nama sekolah
        $this->schoolName = $collaborator && $collaborator->school 
            ? $collaborator->school->school_name 
            : 'Sekolah tidak ditemukan';
    }

    public function mount()
    {
        $user = User::find(1);

        if ($user) {
            $this->npsn = $user->collaborator->npsn ?? null;
            $this->setSchoolName();
        } else {
            throw new \Exception('User dengan ID 2 tidak ditemukan');
        }
        
        // Load user data
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->currentPassword = 'Tes';
        $this->notification_preference = $user->notification_preference;
        $this->temp_notification_preference = $user->notification_preference;
        $this->created_at = $user->created_at;

        // Load collaborator data if exists
        $collaborator = $user->collaborator;
        if ($collaborator) {
            $this->collaboratorId = $collaborator->id;
            $this->collaborator_name = $collaborator->collaborator_name;
            $this->about_me = $collaborator->about_me;
            $this->npsn = $collaborator->npsn;
            $this->profile_image = $collaborator->profile_image;
        }
    }

    public function selectNotificationPreference($preference)
    {
        $this->temp_notification_preference = $preference;
    }

    public function updatedTempImage()
    {
        $this->validate([
            'temp_image' => 'image|max:1024', // 1MB Max
        ]);
    }  

    public function updatedNpsn()
    {
        $this->setSchoolName();
    }

    public function updateProfile()
    {
        $this->validate();

        $user = User::find($this->userId);

        // Update user data
        $user->name = $this->name;
        $user->username = $this->username;
        $user->notification_preference = $this->temp_notification_preference;

        // Update email if changed
        if ($user->email !== $this->email) {
            $this->validate([
                'email' => 'required|email|unique:users,email,' . $this->userId
            ]);
            $user->email = $this->email;
        }

        // Update password if provided
        if ($this->currentPassword && $this->newPassword) {
            if (!Hash::check($this->currentPassword, $user->password)) {
                $this->addError('currentPassword', 'Password saat ini tidak sesuai');
                return;
            }
            $user->password = Hash::make($this->newPassword);
        }

        $user->save();

        // Update or create collaborator
        $collaborator = $user->collaborator ?? new Collaborator();
        $collaborator->collaborator_name = $this->collaborator_name;
        $collaborator->about_me = $this->about_me;
        $collaborator->npsn = $this->npsn;
        
        // Handle profile image upload
        if ($this->temp_image) {
            $imagePath = $this->temp_image->store('profile-images', 'public');
            $collaborator->profile_image = $imagePath;
        }

        // Associate with user if new collaborator
        if (!$collaborator->exists) {
            $collaborator->user_id = $user->id;
        }
        
        $collaborator->save();

        $this->notification_preference = $this->temp_notification_preference;

        session()->flash('message', 'Profil berhasil diperbarui');
    }

    public function render()
    {
        return view('livewire.profile.user-profile-edit');
    }
}
