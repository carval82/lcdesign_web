<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = [
        'name',
        'slug',
        'acronym',
        'description',
        'short_description',
        'type',
        'platform',
        'technology',
        'image',
        'screenshots',
        'download_url',
        'demo_url',
        'playstore_url',
        'video_url',
        'status',
        'features',
        'order',
        'featured',
    ];

    protected $casts = [
        'screenshots' => 'array',
        'features' => 'array',
        'featured' => 'boolean',
    ];

    public function scopeActive($query)
    {
        return $query->where('status', 'active');
    }

    public function scopeFeatured($query)
    {
        return $query->where('featured', true);
    }

    public function scopeApps($query)
    {
        return $query->where('type', 'app');
    }

    public function scopeSoftware($query)
    {
        return $query->where('type', 'software');
    }
}
