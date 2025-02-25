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
        'category',
        'image_url',
        'project_url',
        'github_url',
        'badges',
        'gallery_images',
        'files',
        'download_url',
        'repo_url',
        'status',
        'type',
        'version',
        'version_history'
    ];

    protected $casts = [
        'badges' => 'array',
        'gallery_images' => 'array',
        'files' => 'array',
    ];
}
