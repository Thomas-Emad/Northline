<?php

namespace App\Models;

use App\Models\Concerns\Translatable;
use Illuminate\Database\Eloquent\Model;

class SiteSetting extends Model
{
    use Translatable;

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
        'tech_stack',
        'footer_description',
    ];

    protected $casts = [
        'social_links' => 'array',
        'hero_eyebrow' => 'array',
        'hero_title' => 'array',
        'hero_subtitle' => 'array',
        'stats' => 'array',
        'tech_stack' => 'array',
        'footer_description' => 'array',
    ];

    /**
     * There is only ever one settings row. This helper fetches it,
     * creating bilingual defaults the first time it's called.
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
            'hero_eyebrow' => [
                'en' => 'Software Engineering Studio',
                'ar' => 'استوديو هندسة البرمجيات',
            ],
            'hero_title' => [
                'en' => 'We build software that moves businesses forward.',
                'ar' => 'نبني برمجيات تدفع الأعمال إلى الأمام.',
            ],
            'hero_subtitle' => [
                'en' => 'We design and develop scalable digital solutions that help businesses automate operations, improve efficiency, and turn complex ideas into reliable software.',
                'ar' => 'نصمم ونطوّر حلولاً رقمية قابلة للتوسع تساعد الشركات على أتمتة عملياتها وتحسين كفاءتها وتحويل الأفكار المعقدة إلى برمجيات موثوقة.',
            ],
            'stats' => [
                ['value' => 50, 'suffix' => '+', 'label' => ['en' => 'Projects Delivered', 'ar' => 'مشروعاً منجزاً']],
                ['value' => 20, 'suffix' => '+', 'label' => ['en' => 'Businesses Supported', 'ar' => 'شركة مدعومة']],
                ['value' => 5, 'suffix' => '+', 'label' => ['en' => 'Years of Experience', 'ar' => 'سنوات خبرة']],
                ['value' => 99, 'suffix' => '%', 'label' => ['en' => 'Client Satisfaction', 'ar' => 'رضا العملاء']],
            ],
            'tech_stack' => [
                ['key' => 'frontend', 'items' => ['Vue.js', 'React', 'TypeScript']],
                ['key' => 'backend', 'items' => ['Laravel', 'PHP', 'Node.js']],
                ['key' => 'database', 'items' => ['MySQL', 'PostgreSQL', 'Redis']],
                ['key' => 'infrastructure', 'items' => ['Docker', 'Linux', 'Cloud']],
            ],
            'footer_description' => [
                'en' => 'A software engineering studio designing custom applications, ERP systems, and integrations for growing businesses.',
                'ar' => 'استوديو هندسة برمجيات يصمم تطبيقات مخصصة وأنظمة تخطيط موارد وتكاملات للشركات النامية.',
            ],
        ]);
    }

    /**
     * Plain array with all translatable fields resolved to the current
     * locale — this is what gets handed to Inertia/Vue, so the frontend
     * never has to know these fields are locale-keyed JSON under the hood.
     */
    public function toPublicArray(): array
    {
        return [
            'company_name' => $this->company_name,
            'logo' => $this->logo,
            'email' => $this->email,
            'phone' => $this->phone,
            'address' => $this->address,
            'social_links' => $this->social_links,
            'hero_eyebrow' => $this->translated('hero_eyebrow'),
            'hero_title' => $this->translated('hero_title'),
            'hero_subtitle' => $this->translated('hero_subtitle'),
            'stats' => collect($this->stats ?? [])->map(fn ($stat) => [
                'value' => $stat['value'],
                'suffix' => $stat['suffix'],
                'label' => is_array($stat['label'] ?? null)
                    ? ($stat['label'][app()->getLocale()] ?? $stat['label']['en'] ?? '')
                    : ($stat['label'] ?? ''),
            ])->all(),
            'tech_stack' => $this->tech_stack,
            'footer_description' => $this->translated('footer_description'),
        ];
    }
}
