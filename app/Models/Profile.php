<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    use HasFactory;

    protected $fillable = [
        'profile_image',
        'about_me',
        'notification_preference',
    ];

    public function school()
    {
        return $this->belongsTo(School::class, 'npsn', 'npsn');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function collaborator()
    {
        return $this->belongsTo(Collaborator::class, 'collab_id');
    }
}
