<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\SiteSetting;
use Inertia\Inertia;
use Inertia\Response;

class ProjectController extends Controller
{
    public function index(): Response
    {
        return Inertia::render('Projects', [
            'settings' => SiteSetting::current()->toPublicArray(),
            'projects' => Project::published()->orderBy('sort_order')->get()->map->toPublicArray(),
        ]);
    }

    public function show(Project $project): Response
    {
        $related = Project::published()
            ->where('id', '!=', $project->id)
            ->where('category', $project->category)
            ->limit(3)
            ->get();

        if ($related->isEmpty()) {
            $related = Project::published()->where('id', '!=', $project->id)->limit(3)->get();
        }

        return Inertia::render('ProjectDetails', [
            'settings' => SiteSetting::current()->toPublicArray(),
            'project' => $project->toPublicArray(),
            'relatedProjects' => $related->map->toPublicArray(),
        ]);
    }
}
