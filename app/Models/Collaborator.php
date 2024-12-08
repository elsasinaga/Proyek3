<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Collaborator extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'collaborator_name',
    ];

    public function moduleLkpds()
    {
        return $this->belongsToMany(ModuleLkpd::class, 'module_lkpd_collabs', 'collab_id', 'lkpd_id');
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
