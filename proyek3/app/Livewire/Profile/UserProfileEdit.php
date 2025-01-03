<?php

namespace App\Livewire\Profile;

use Livewire\Component;
use App\Models\User;
use App\Models\Profile;
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
    public $created_at;

    // Profile fields
    public $profileId;
    public $profile_image;
    public $about_me;
    public $notification_preference;
    public $temp_notification_preference;
    public $temp_image;
    public $npsn;
    public $schoolName;

    // Collaborator fields
    public $collaboratorId;
    public $collaborator_name;

    // Password fields
    public $currentPassword = '';
    public $newPassword = '';
    public $showCurrentPassword = false;
    public $showNewPassword = false;


    protected $rules = [
        'name' => 'required|min:3',
        'username' => 'required|min:3',
        'email' => 'required|email',
        'currentPassword' => 'nullable|min:6',
        'newPassword' => 'nullable|min:6',

        'temp_notification_preference' => 'required|in:none,immediate,daily',
        'about_me' => 'nullable|string',
        'temp_image' => 'nullable|image|max:1024', // 1MB Max
        'npsn' => 'required|exists:schools,npsn',

        'collaborator_name' => 'required|min:3',
    ];

    public function getSchools()
    {
        return School::all(['npsn', 'school_name']);
    }

    public function setSchoolName()
    {
        if ($this->npsn) {
            $school = School::where('npsn', $this->npsn)->first();
            $this->schoolName = $school ? $school->school_name : 'Sekolah tidak ditemukan';
        }
    }

    public function mount()
    {
        $user = User::find(2);

        if (!$user) {
            throw new \Exception('User tidak ditemukan');
        }
        
        $this->userId = $user->id;
        $this->name = $user->name;
        $this->username = $user->username;
        $this->email = $user->email;
        $this->created_at = $user->created_at;

        $profile = $user->profile;
        if ($profile) {
            $this->profileId = $profile->id;
            $this->profile_image = $profile->profile_image;
            $this->about_me = $profile->about_me;
            $this->notification_preference = $profile->notification_preference;
            $this->temp_notification_preference = $profile->notification_preference;
            $this->npsn = $profile->npsn;
            $this->setSchoolName();
        }

        $collaborator = $user->profile?->collaborator;
        if ($collaborator) {
            $this->collaboratorId = $collaborator->id;
            $this->collaborator_name = $collaborator->collaborator_name;
        }

        $this->temp_image = null;
    }

    public function selectNotificationPreference($preference)
    {
        $this->temp_notification_preference = $preference;
    }

    public function toggleCurrentPassword()
    {
        $this->showCurrentPassword = !$this->showCurrentPassword;
    }

    public function toggleNewPassword()
    {
        $this->showNewPassword = !$this->showNewPassword;
    }

    public function updatedTempImage()
    {
        $this->validate([
            'temp_image' => 'image|max:2048', // 2MB Max
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

        $profile = $user->profile ?? new Profile();
        $profile->about_me = $this->about_me;
        $profile->notification_preference = $this->temp_notification_preference;
        $profile->npsn = $this->npsn;
        
        // Profile Image
        if ($this->temp_image) {
            $imagePath = $this->temp_image->store('profile-images', 'public');
            $profile->profile_image = $imagePath;
        }

        if (!$profile->exists) {
            $profile->user_id = $user->id;
        }
        
        $profile->save();

        if ($this->collaborator_name) {
            $collaborator = $profile->collaborator ?? new Collaborator();
            $collaborator->collaborator_name = $this->collaborator_name;
            $collaborator->save();

            if (!$profile->collab_id) {
                $profile->collab_id = $collaborator->id;
                $profile->save();
            }
        }

        $this->notification_preference = $this->temp_notification_preference;

        session()->flash('message', 'Profil berhasil diperbarui');

        return redirect()->to('/profile');
    }

    Public function backToProfile()
    {
        return redirect()->back();
    }

    public function render()
    {
        return view('livewire.profile.user-profile-edit');
    }
}