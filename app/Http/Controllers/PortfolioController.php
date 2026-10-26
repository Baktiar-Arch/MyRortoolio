<?php

namespace App\Http\Controllers;

use App\Models\Project;
use App\Models\Skill;
use Illuminate\Contracts\View\View;

class PortfolioController extends Controller
{
    public function index(): View
    {
        $projects = Project::query()->latest()->get();
        $skillsGrouped = Skill::groupedByCategory();

        return view('portfolio.index', [
            'projects' => $projects,
            'skillsGrouped' => $skillsGrouped,
        ]);
    }

    public function show(Project $project): View
    {
        $relatedProjects = Project::query()
            ->whereKeyNot($project->id)
            ->latest()
            ->take(3)
            ->get();

        return view('portfolio.show', [
            'project' => $project,
            'relatedProjects' => $relatedProjects,
        ]);
    }
}
