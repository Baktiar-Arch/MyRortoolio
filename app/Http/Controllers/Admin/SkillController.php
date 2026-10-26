<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SaveSkillRequest;
use App\Models\Skill;
use Illuminate\Contracts\View\View;
use Illuminate\Http\RedirectResponse;

class SkillController extends Controller
{
    public function index(): View
    {
        return view('admin.skills.index', [
            'skills' => Skill::query()->ordered()->paginate(15),
        ]);
    }

    public function create(): View
    {
        return view('admin.skills.create');
    }

    public function store(SaveSkillRequest $request): RedirectResponse
    {
        Skill::query()->create($request->validated());

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil ditambahkan.');
    }

    public function edit(Skill $skill): View
    {
        return view('admin.skills.edit', [
            'skill' => $skill,
        ]);
    }

    public function update(SaveSkillRequest $request, Skill $skill): RedirectResponse
    {
        $skill->update($request->validated());

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil diperbarui.');
    }

    public function destroy(Skill $skill): RedirectResponse
    {
        $skill->delete();

        return redirect()
            ->route('admin.skills.index')
            ->with('success', 'Skill berhasil dihapus.');
    }
}
