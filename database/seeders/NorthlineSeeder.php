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
                'title' => ['en' => 'Custom Software Development', 'ar' => 'تطوير برمجيات مخصصة'],
                'slug' => 'custom-software-development',
                'short_description' => [
                    'en' => 'Tailored applications designed around specific business workflows.',
                    'ar' => 'تطبيقات مصممة خصيصاً حول سير عمل محدد لأعمالك.',
                ],
                'full_description' => [
                    'en' => 'We build business applications, internal platforms, SaaS products and enterprise software shaped around how your teams actually work — not a generic template.',
                    'ar' => 'نبني تطبيقات أعمال ومنصات داخلية ومنتجات SaaS وبرمجيات مؤسسية مصممة حول طريقة عمل فرقك فعلياً — لا قالباً جاهزاً.',
                ],
                'icon' => 'code',
                'features' => [
                    'en' => ['Business applications', 'Internal platforms', 'SaaS products', 'Workflow systems', 'Enterprise software'],
                    'ar' => ['تطبيقات أعمال', 'منصات داخلية', 'منتجات SaaS', 'أنظمة سير العمل', 'برمجيات مؤسسية'],
                ],
                'technologies' => ['Laravel', 'Vue.js', 'TypeScript'],
                'sort_order' => 1,
            ],
            [
                'title' => ['en' => 'Web Application Development', 'ar' => 'تطوير تطبيقات الويب'],
                'slug' => 'web-application-development',
                'short_description' => [
                    'en' => 'Modern, scalable web applications built for performance and usability.',
                    'ar' => 'تطبيقات ويب حديثة وقابلة للتوسع مبنية للأداء وسهولة الاستخدام.',
                ],
                'full_description' => [
                    'en' => 'From customer portals to internal tools, we build fast, accessible web applications that scale with your user base.',
                    'ar' => 'من بوابات العملاء إلى الأدوات الداخلية، نبني تطبيقات ويب سريعة يسهل الوصول إليها وتتوسع مع قاعدة مستخدميك.',
                ],
                'icon' => 'browser',
                'features' => [
                    'en' => ['Customer portals', 'Progressive web apps', 'Real-time features', 'Multi-tenant architecture'],
                    'ar' => ['بوابات العملاء', 'تطبيقات ويب تقدمية', 'ميزات آنية', 'بنية متعددة المستأجرين'],
                ],
                'technologies' => ['Vue.js', 'React', 'Node.js'],
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'ERP & Business Systems', 'ar' => 'أنظمة تخطيط الموارد والأعمال'],
                'slug' => 'erp-business-systems',
                'short_description' => [
                    'en' => 'Enterprise systems that connect operations, finance, sales and inventory.',
                    'ar' => 'أنظمة مؤسسية تربط العمليات والمالية والمبيعات والمخزون.',
                ],
                'full_description' => [
                    'en' => 'We design ERP systems that unify departments into one source of truth, replacing spreadsheets and disconnected tools.',
                    'ar' => 'نصمم أنظمة تخطيط موارد توحّد الأقسام في مصدر معلومات واحد، بدلاً من جداول البيانات والأدوات المتفرقة.',
                ],
                'icon' => 'stack',
                'features' => [
                    'en' => ['Inventory management', 'Finance & accounting', 'HR & payroll', 'Sales pipelines'],
                    'ar' => ['إدارة المخزون', 'المالية والمحاسبة', 'الموارد البشرية والرواتب', 'مسارات المبيعات'],
                ],
                'technologies' => ['Laravel', 'MySQL', 'Filament'],
                'sort_order' => 3,
            ],
            [
                'title' => ['en' => 'API & System Integration', 'ar' => 'تكامل الأنظمة وواجهات البرمجة'],
                'slug' => 'api-system-integration',
                'short_description' => [
                    'en' => 'Connect existing platforms, payment providers, and third-party systems.',
                    'ar' => 'ربط المنصات الحالية ومزودي الدفع والأنظمة الخارجية.',
                ],
                'full_description' => [
                    'en' => 'We integrate the tools you already use — payment gateways, CRMs, shipping providers — into one connected system.',
                    'ar' => 'ندمج الأدوات التي تستخدمها بالفعل — بوابات الدفع وأنظمة إدارة العملاء وشركات الشحن — في نظام واحد متصل.',
                ],
                'icon' => 'link',
                'features' => [
                    'en' => ['Payment gateways', 'CRM sync', 'Webhooks', 'Third-party APIs'],
                    'ar' => ['بوابات الدفع', 'مزامنة إدارة العملاء', 'Webhooks', 'واجهات برمجية خارجية'],
                ],
                'technologies' => ['REST', 'GraphQL', 'Node.js'],
                'sort_order' => 4,
            ],
            [
                'title' => ['en' => 'Automation', 'ar' => 'الأتمتة'],
                'slug' => 'automation',
                'short_description' => [
                    'en' => 'Reduce repetitive work and improve operational efficiency.',
                    'ar' => 'تقليل العمل المتكرر وتحسين كفاءة العمليات.',
                ],
                'full_description' => [
                    'en' => 'We automate the manual processes that quietly consume hours every week — reconciliation, reporting, data entry, and more.',
                    'ar' => 'نؤتمت العمليات اليدوية التي تستهلك ساعات أسبوعياً بصمت — التسوية والتقارير وإدخال البيانات وغيرها.',
                ],
                'icon' => 'bolt',
                'features' => [
                    'en' => ['Workflow automation', 'Scheduled jobs', 'Document generation', 'Notifications'],
                    'ar' => ['أتمتة سير العمل', 'مهام مجدولة', 'توليد المستندات', 'الإشعارات'],
                ],
                'technologies' => ['Laravel Queues', 'Redis'],
                'sort_order' => 5,
            ],
            [
                'title' => ['en' => 'Dashboards & Analytics', 'ar' => 'لوحات البيانات والتحليلات'],
                'slug' => 'dashboards-analytics',
                'short_description' => [
                    'en' => 'Transform business data into dashboards people actually use.',
                    'ar' => 'تحويل بيانات العمل إلى لوحات بيانات يستخدمها الناس فعلياً.',
                ],
                'full_description' => [
                    'en' => 'We build dashboards that surface the metrics that matter, refreshed in real time, so decisions are made on current data.',
                    'ar' => 'نبني لوحات بيانات تُظهر المؤشرات المهمة وتتحدث آنياً، ليتم اتخاذ القرارات بناءً على بيانات حالية.',
                ],
                'icon' => 'chart',
                'features' => [
                    'en' => ['Real-time metrics', 'Custom reports', 'Data visualization', 'Role-based access'],
                    'ar' => ['مؤشرات آنية', 'تقارير مخصصة', 'تصور البيانات', 'صلاحيات حسب الدور'],
                ],
                'technologies' => ['Vue.js', 'PostgreSQL'],
                'sort_order' => 6,
            ],
        ];

        foreach ($services as $service) {
            Service::updateOrCreate(['slug' => $service['slug']], $service);
        }

        $projects = [
            [
                'title' => ['en' => 'Horizon Retail ERP', 'ar' => 'نظام هورايزون لتخطيط موارد التجزئة'],
                'slug' => 'horizon-retail-erp',
                'description' => [
                    'en' => 'Unified inventory, finance and staff scheduling for a 40-store retail chain.',
                    'ar' => 'توحيد المخزون والمالية وجدولة الموظفين لسلسلة متاجر تضم 40 فرعاً.',
                ],
                'long_description' => [
                    'en' => 'Horizon Retail was running inventory, payroll, and finance across five disconnected tools. We built a single ERP that unified all three, cutting month-end close time significantly.',
                    'ar' => 'كانت هورايزون تدير المخزون والرواتب والمالية عبر خمس أدوات منفصلة. بنينا نظام تخطيط موارد واحد وحّد الثلاثة، ما قلّص وقت إغلاق نهاية الشهر بشكل كبير.',
                ],
                'category' => 'ERP',
                'client' => 'Horizon Retail Group',
                'technologies' => ['Laravel', 'Vue.js', 'MySQL'],
                'results' => [
                    'en' => ['Reduced manual reconciliation by 70%', 'Unified reporting across 40 stores', 'Faster month-end close'],
                    'ar' => ['تقليل التسوية اليدوية بنسبة 70%', 'تقارير موحّدة عبر 40 فرعاً', 'إغلاق أسرع لنهاية الشهر'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 1,
            ],
            [
                'title' => ['en' => 'Fieldbase', 'ar' => 'فيلدبيس'],
                'slug' => 'fieldbase',
                'description' => [
                    'en' => 'Scheduling and dispatch platform for field service teams.',
                    'ar' => 'منصة جدولة وتوزيع لفرق الخدمة الميدانية.',
                ],
                'long_description' => [
                    'en' => 'Fieldbase replaced a paper-based dispatch process with a real-time scheduling platform for a 200-technician field service company.',
                    'ar' => 'استبدلت فيلدبيس عملية توزيع ورقية بمنصة جدولة آنية لشركة خدمة ميدانية تضم 200 فني.',
                ],
                'category' => 'SaaS',
                'client' => 'Fieldbase Services',
                'technologies' => ['Node.js', 'React'],
                'results' => [
                    'en' => ['Cut dispatch time from hours to minutes', 'Improved on-time arrival rate'],
                    'ar' => ['تقليص وقت التوزيع من ساعات إلى دقائق', 'تحسين معدل الوصول في الوقت المحدد'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 2,
            ],
            [
                'title' => ['en' => 'Aurelia Storefront', 'ar' => 'متجر أوريليا'],
                'slug' => 'aurelia-storefront',
                'description' => [
                    'en' => 'Headless commerce platform with real-time inventory sync.',
                    'ar' => 'منصة تجارة إلكترونية Headless مع مزامنة مخزون آنية.',
                ],
                'long_description' => [
                    'en' => 'A headless storefront built to keep inventory in sync across warehouse, POS, and online channels in real time.',
                    'ar' => 'واجهة متجر Headless مبنية لإبقاء المخزون متزامناً بين المستودع ونقاط البيع والقنوات الإلكترونية آنياً.',
                ],
                'category' => 'E-commerce',
                'client' => 'Aurelia',
                'technologies' => ['Vue.js', 'PostgreSQL'],
                'results' => [
                    'en' => ['Eliminated overselling incidents', 'Faster page loads'],
                    'ar' => ['القضاء على حالات البيع الزائد', 'تحميل أسرع للصفحات'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 3,
            ],
            [
                'title' => ['en' => 'Ledgerflow', 'ar' => 'ليدجرفلو'],
                'slug' => 'ledgerflow',
                'description' => [
                    'en' => 'Automated reconciliation pipeline replacing 20+ manual hours a week.',
                    'ar' => 'خط تسوية آلي يحل محل أكثر من 20 ساعة عمل يدوي أسبوعياً.',
                ],
                'long_description' => [
                    'en' => 'Ledgerflow automates transaction reconciliation across three payment processors, replacing a manual weekly process.',
                    'ar' => 'تُؤتمت ليدجرفلو تسوية المعاملات عبر ثلاث بوابات دفع، لتحل محل عملية أسبوعية يدوية.',
                ],
                'category' => 'Automation',
                'client' => 'Confidential — Fintech',
                'technologies' => ['Laravel', 'Redis'],
                'results' => [
                    'en' => ['Saved 20+ hours per week', 'Near-zero reconciliation errors'],
                    'ar' => ['توفير أكثر من 20 ساعة أسبوعياً', 'أخطاء تسوية شبه معدومة'],
                ],
                'is_featured' => true,
                'is_published' => true,
                'sort_order' => 4,
            ],
            [
                'title' => ['en' => 'Guestline Ops', 'ar' => 'جيستلاين أوبس'],
                'slug' => 'guestline-ops',
                'description' => [
                    'en' => 'Booking and operations dashboard for a boutique hotel group.',
                    'ar' => 'لوحة حجوزات وعمليات لمجموعة فنادق بوتيك.',
                ],
                'long_description' => [
                    'en' => 'A single operations dashboard covering bookings, housekeeping status, and occupancy forecasting for a six-property hotel group.',
                    'ar' => 'لوحة عمليات واحدة تغطي الحجوزات وحالة التدبير المنزلي وتوقعات الإشغال لمجموعة من ستة فنادق.',
                ],
                'category' => 'Hospitality',
                'client' => 'Guestline Hotels',
                'technologies' => ['TypeScript', 'Docker'],
                'results' => [
                    'en' => ['Reduced front-desk workload', 'Real-time occupancy visibility'],
                    'ar' => ['تقليل عبء عمل مكتب الاستقبال', 'رؤية آنية لحالة الإشغال'],
                ],
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
                'testimonial' => [
                    'en' => 'Northline understood our operations before writing a line of code. The ERP they built runs our business today.',
                    'ar' => 'فهمت نورثلاين عملياتنا قبل كتابة أي سطر من الكود. نظام تخطيط الموارد الذي بنوه يدير أعمالنا اليوم.',
                ],
                'rating' => 5,
                'is_published' => true,
            ],
            [
                'client_name' => 'Daniel Osei',
                'company' => 'Fieldbase Services',
                'position' => 'Founder',
                'testimonial' => [
                    'en' => 'They shipped a dispatch platform our technicians actually enjoy using. That is a rare thing.',
                    'ar' => 'قدّموا منصة توزيع يستمتع فنيونا فعلياً باستخدامها. هذا أمر نادر.',
                ],
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
