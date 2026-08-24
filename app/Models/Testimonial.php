<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Testimonial extends Model
{
    use HasFactory, Translatable;

    protected $fillable = [
        'client_name',
        'company',
        'position',
        'testimonial',
        'avatar',
        'rating',
        'is_published',
    ];

    protected $casts = [
        'testimonial' => 'array',
        'is_published' => 'boolean',
        'rating' => 'integer',
    ];

    public function scopePublished($query)
    {
        return $query->where('is_published', true);
    }

    public function toPublicArray(): array
    {
        return [
            'id' => $this->id,
            'client_name' => $this->client_name,
            'company' => $this->company,
            'position' => $this->position,
            'testimonial' => $this->translated('testimonial'),
            'avatar' => $this->avatar,
            'rating' => $this->rating,
        ];
    }
}
