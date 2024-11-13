<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class LkpdStep extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'step_number',
        'step_title',
        'step_description',
        'step_image',
    ];

    /**
     * Get the module LKPD that owns the LKPD step.
     */
    public function moduleLkpd()
    {
        return $this->belongsTo(ModuleLkpd::class, 'lkpd_id');
    }
}
