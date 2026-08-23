<?php

namespace Database\Seeders;

use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Illuminate\Database\Seeder;

class NorthlineSeeder extends Seeder
{
    public function run(): void
    {
        SiteSetting::current();

        $services = [
            [
                'title' => 'Custom Software Development',
                'slug' => 'custom-software-development',
                'short_description' => 'Tailored applications designed around specific business workflows.',
                'full_description' => 'We build business applications, internal platforms, SaaS products and enterprise software shaped around how your teams actually work — not a generic template.',
                'icon' => 'code',
                'features' => ['Business applications', 'Internal platforms', 'SaaS products', 'Workflow systems', 'Enterprise software'],
                'technologies' => ['Laravel', 'Vue.js', 'TypeScript'],
                'sort_order' => 1,
            ],
            [
                'title' => 'Web Application Development',
                'slug' => 'web-application-development',
                'short_description' => 'Modern, scalable web applications built for performance and usability.',
                'full_description' => 'From customer portals to internal tools, we build fast, accessible web applications that scale with your user base.',
                'icon' => 'browser',
                'features' => ['Customer portals', 'Progressive web apps', 'Real-time features', 'Multi-tenant architecture'],
                'technologies' => ['Vue.js', 'React', 'Node.js'],
                'sort_order' => 2,
            ],
            [
                'title' => 'ERP & Business Systems',
                'slug' => 'erp-business-systems',
                'short_description' => 'Enterprise systems that connect operations, finance, sales and inventory.',
                'full_description' => 'We design ERP systems that unify departments into one source of truth, replacing spreadsheets and disconnected tools.',
                'icon' => 'stack',
                'features' => ['Inventory management', 'Finance & accounting', 'HR & payroll', 'Sales pipelines'],
                'technologies' => ['Laravel', 'MySQL', 'Filament'],
                'sort_order' => 3,
            ],
            [
                'title' => 'API & System Integration',
                'slug' => 'api-system-integration',
                'short_description' => 'Connect existing platforms, payment providers, and third-party systems.',
                'full_description' => 'We integrate the tools you already use — payment gateways, CRMs, shipping providers — into one connected system.',
                'icon' => 'link',
                'features' => ['Payment gateways', 'CRM sync', 'Webhooks', 'Third-party APIs'],
                'technologies' => ['REST', 'GraphQL', 'Node.js'],
                'sort_order' => 4,
            ],
            [
                'title' => 'Automation',
                'slug' => 'automation',
                'short_description' => 'Reduce repetitive work and improve operational efficiency.',
                'full_description' => 'We automate the manual processes that quietly consume hours every week — reconciliation, reporting, data entry, and more.',
                'icon' => 'bolt',
                'features' => ['Workflow automation', 'Scheduled jobs', 'Document generation', 'Notifications'],
                'technologies' => ['Laravel Queues', 'Redis'],
                'sort_order' => 5,
            ],
            [
                'title' => 'Dashboards & Analytics',
                'slug' => 'dashboards-analytics',
                'short_description' => 'Transform business data into dashboards people actually use.',
                'full_description' => 'We build dashboards that surface the metrics that matter, refreshed in real time, so decisions are made on current data.',
                'icon' => 'chart',
                'features' => ['Real-time metrics', 'Custom reports', 'Data visualization', 'Role-based access'],
                'technologies' => ['Vue.js', 'PostgreSQL'],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        $projects = [
            [
                'title' => 'Horizon Retail ERP',
                'slug' => 'horizon-retail-erp',
                'description' => 'Unified inventory, finance and staff scheduling for a 40-store retail chain.',
                'long_description' => 'Horizon Retail was running inventory, payroll, and finance across five disconnected tools. We built a single ERP that unified all three, cutting month-end close time significantly.',
                'category' => 'ERP',
                'client' => 'Horizon Retail Group',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL'],
                'results' => ['Reduced manual reconciliation by 70%', 'Unified reporting across 40 stores', 'Faster month-end close'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => 'Fieldbase',
                'slug' => 'fieldbase',
                'description' => 'Scheduling and dispatch platform for field service teams.',
                'long_description' => 'Fieldbase replaced a paper-based dispatch process with a real-time scheduling platform for a 200-technician field service company.',
                'category' => 'SaaS',
                'client' => 'Fieldbase Services',
                'technologies' => ['Node.js', 'React'],
                'results' => ['Cut dispatch time from hours to minutes', 'Improved on-time arrival rate'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => 'Aurelia Storefront',
                'slug' => 'aurelia-storefront',
                'description' => 'Headless commerce platform with real-time inventory sync.',
                'long_description' => 'A headless storefront built to keep inventory in sync across warehouse, POS, and online channels in real time.',
                'category' => 'E-commerce',
                'client' => 'Aurelia',
                'technologies' => ['Vue.js', 'PostgreSQL'],
                'results' => ['Eliminated overselling incidents', 'Faster page loads'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => 'Ledgerflow',
                'slug' => 'ledgerflow',
                'description' => 'Automated reconciliation pipeline replacing 20+ manual hours a week.',
                'long_description' => 'Ledgerflow automates transaction reconciliation across three payment processors, replacing a manual weekly process.',
                'category' => 'Automation',
                'client' => 'Confidential — Fintech',
                'technologies' => ['Laravel', 'Redis'],
                'results' => ['Saved 20+ hours per week', 'Near-zero reconciliation errors'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => 'Guestline Ops',
                'slug' => 'guestline-ops',
                'description' => 'Booking and operations dashboard for a boutique hotel group.',
                'long_description' => 'A single operations dashboard covering bookings, housekeeping status, and occupancy forecasting for a six-property hotel group.',
                'category' => 'Hospitality',
                'client' => 'Guestline Hotels',
                'technologies' => ['TypeScript', 'Docker'],
                'results' => ['Reduced front-desk workload', 'Real-time occupancy visibility'],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 5,
            ],
        ];

        foreach ($projects as $project) {
            Project::updateOrCreate(['slug' => $project['slug']], $project);
        }

        $testimonials = [
            [
                'client_name' => 'Sara Whitfield',
                'company' => 'Horizon Retail Group',
                'position' => 'COO',
                'testimonial' => 'Northline understood our operations before writing a line of code. The ERP they built runs our business today.',
                'rating' => 5,
                'is_published' => true,
            ],
            [
                'client_name' => 'Daniel Osei',
                'company' => 'Fieldbase Services',
                'position' => 'Founder',
                'testimonial' => 'They shipped a dispatch platform our technicians actually enjoy using. That is a rare thing.',
                'rating' => 5,
                'is_published' => true,
            ],
        ];

        foreach ($testimonials as $testimonial) {
            Testimonial::updateOrCreate(
                ['client_name' => $testimonial['client_name'], 'company' => $testimonial['company']],
                $testimonial
            );
        }
    }
}
