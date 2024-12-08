<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ModuleLkpd extends Model
{
    use HasFactory;


    protected $table = 'module_lkpds'; // Sesuaikan dengan nama tabel di migrasi
    // public function favorites()
    // {
    //     return $this->hasMany(LkpdFavorite::class, 'lkpd_id', 'id');
    // }
    
    protected $fillable = [
        'lkpd_title',
        'lkpd_image',
        'lkpd_description',
        'user_id',
        'category_id',
        'material_name',
        'material_image',
        'Kelas',
        'Jenjang',
        'kolaborasi',
        // 'tags'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function lkpdSteps()
    {
        return $this->hasMany(LkpdStep::class, 'lkpd_id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'module_lkpd_tags', 'lkpd_id', 'tag_id')
                    ->withTimestamps(); // Tambahkan ini untuk mengisi timestamps
    }

    public function collaborator()
    {
        return $this->belongsToMany(Tag::class, 'module_lkpd_collabs', 'lkpd_id', 'collab_id');
    }
}