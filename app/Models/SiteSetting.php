<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    protected $fillable = [
        'company_name',
        'logo',
        'email',
        'phone',
        'address',
        'social_links',
        'hero_eyebrow',
        'hero_title',
        'hero_subtitle',
        'stats',
        'footer_description',
    ];

    protected $casts = [
        'social_links' => 'array',
        'stats' => 'array',
    ];

    /**
     * There is only ever one settings row. This helper fetches it,
     * creating a sensible default the first time it's called.
     */
    public static function current(): self
    {
        return static::query()->firstOrCreate([], [
            'company_name' => 'Northline',
            'email' => 'hello@northline.dev',
            'phone' => '+1 (555) 018-2042',
            'address' => 'Remote & on-site',
            'social_links' => [
                'linkedin' => '#',
                'github' => '#',
                'facebook' => '#',
                'instagram' => '#',
            ],
            'hero_eyebrow' => 'Software Engineering Studio',
            'hero_title' => 'We build software that moves businesses forward.',
            'hero_subtitle' => 'We design and develop scalable digital solutions that help businesses automate operations, improve efficiency, and turn complex ideas into reliable software.',
            'stats' => [
                ['value' => 50, 'suffix' => '+', 'label' => 'Projects Delivered'],
                ['value' => 20, 'suffix' => '+', 'label' => 'Businesses Supported'],
                ['value' => 5, 'suffix' => '+', 'label' => 'Years of Experience'],
                ['value' => 99, 'suffix' => '%', 'label' => 'Client Satisfaction'],
            ],
            'footer_description' => 'A software engineering studio designing custom applications, ERP systems, and integrations for growing businesses.',
        ]);
    }
}
