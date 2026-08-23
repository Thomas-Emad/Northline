<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'description',
        'long_description',
        'category',
        'client',
        'technologies',
        'featured_image',
        'gallery',
        'project_url',
        'github_url',
        'completion_date',
        'is_featured',
        'is_published',
        'results',
        'sort_order',
    ];

    protected $casts = [
        'technologies' => 'array',
        'gallery' => 'array',
        'results' => 'array',
        'is_featured' => 'boolean',
        'is_published' => 'boolean',
        'completion_date' => 'date',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function scopeFeatured($query)
    {
        return $query->where('is_featured', true);
    }

    public function getRouteKeyName(): string
    {
        return 'slug';
    }
}
