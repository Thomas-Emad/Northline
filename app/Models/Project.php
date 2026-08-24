<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory, Translatable;

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
        'title' => 'array',
        'description' => 'array',
        'long_description' => 'array',
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

    /**
     * Plain array with translatable fields resolved to the current locale.
     */
    public function toPublicArray(): array
    {
        return [
            'id' => $this->id,
            'slug' => $this->slug,
            'title' => $this->translated('title'),
            'description' => $this->translated('description'),
            'long_description' => $this->translated('long_description'),
            'category' => $this->category,
            'client' => $this->client,
            'technologies' => $this->technologies,
            'featured_image' => $this->featured_image,
            'gallery' => $this->gallery,
            'project_url' => $this->project_url,
            'github_url' => $this->github_url,
            'completion_date' => $this->completion_date?->toDateString(),
            'results' => $this->translated('results'),
            'is_featured' => $this->is_featured,
        ];
    }
}
