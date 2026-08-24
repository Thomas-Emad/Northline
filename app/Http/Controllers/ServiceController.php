<?php

namespace App\Http\Controllers;

use App\Models\Service;
use App\Models\SiteSetting;
use Inertia\Inertia;
use Inertia\Response;

class ServiceController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Services', [
            'settings' => SiteSetting::current()->toPublicArray(),
            'services' => Service::active()->get()->map->toPublicArray(),
        ]);
    }

    public function show(Service $service): Response
    {
        return Inertia::render('ServiceDetails', [
            'settings' => SiteSetting::current()->toPublicArray(),
            'service' => $service->toPublicArray(),
        ]);
    }
}
