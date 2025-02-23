<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $table = 'projects';

    protected $fillable = [
        'title',
        'description',
        'image_url',
        'category',
        'download_url',
        'repo_url',
        'status',
        'type',
        'version',
        'version_history',
        'badges',
        'gallery_images',
        'files',
        'icon',
    ];

    // 'gallery_images' is JSON column in DB
    // 'badges' is stored as JSON text in DB
    protected $casts = [
        'gallery_images' => 'array',
        'badges' => 'array',
        'files' => 'array',
    ];

    public function getBadgesArrayAttribute()
    {
        return json_decode($this->badges, true) ?? [];
    }
}
