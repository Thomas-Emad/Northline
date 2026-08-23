<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Service;
use App\Models\SiteSetting;
use App\Models\Testimonial;
use Inertia\Inertia;
use Inertia\Response;

class HomeController extends Controller
{
    public function __invoke(): Response
    {
        return Inertia::render('Home', [
            'settings' => SiteSetting::current(),
            'services' => Service::active()->get(),
            'projects' => Project::published()->featured()->orderBy('sort_order')->limit(5)->get(),
            'testimonials' => Testimonial::published()->latest()->limit(6)->get(),
        ]);
    }
}
