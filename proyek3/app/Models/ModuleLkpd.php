<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleLkpd extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'lkpd_title',
        'lkpd_image',
        'lkpd_description',
        'user_id',
        'category_id',
        'material_name',
        'material_image',
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lkpdstep()
    {
        return $this->hasMany(LkpdStep::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'module_lkpd_tags', 'lkpd_id', 'tag_id');
    }

    public function collaborator()
    {
        return $this->belongsToMany(Tag::class, 'module_lkpd_collabs', 'lkpd_id', 'collab_id');
    }
}