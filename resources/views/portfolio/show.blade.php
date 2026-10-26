@extends('layouts.app')

@section('title', $project->title . ' — ' . config('portfolio.owner'))

@section('content')
    <div class="pt-16">
        <article class="mx-auto max-w-4xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="reveal">
                <a href="{{ route('portfolio.index') }}#projects"
                   class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 transition hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali ke daftar proyek
                </a>

                <h1 class="mt-6 text-3xl font-extrabold tracking-tight text-gray-900 sm:text-4xl dark:text-white">
                    {{ $project->title }}
                </h1>

                <div class="mt-4 flex flex-wrap items-center gap-3">
                    @foreach ($project->techStackList() as $tech)
                        <x-skill-badge :name="$tech" />
                    @endforeach
                </div>
            </div>

            <div class="reveal mt-10 overflow-hidden rounded-2xl border border-gray-200 bg-gradient-to-br from-indigo-500/10 via-sky-500/10 to-emerald-500/10 dark:border-gray-800 dark:from-indigo-500/20 dark:via-sky-500/20 dark:to-emerald-500/20">
                @if ($project->thumbnail)
                    <img src="{{ $project->thumbnail }}" alt="Thumbnail {{ $project->title }}" class="h-auto w-full object-cover">
                @else
                    <div class="flex aspect-video items-center justify-center">
                        <svg class="h-24 w-24 text-indigo-400/60 dark:text-indigo-500/50" fill="none" viewBox="0 0 24 24" stroke-width="1" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                        </svg>
                    </div>
                @endif
            </div>

            <div class="reveal mt-10">
                <h2 class="text-lg font-bold text-gray-900 dark:text-white">Deskripsi</h2>
                <div class="mt-3 space-y-4 text-base leading-relaxed text-gray-600 dark:text-gray-400">
                    @foreach (preg_split('/\R{2,}/', trim($project->description)) as $paragraph)
                        <p>{{ $paragraph }}</p>
                    @endforeach
                </div>
            </div>

            <div class="reveal mt-10 flex flex-wrap gap-4">
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 rounded-xl bg-indigo-600 px-5 py-2.5 text-sm font-semibold text-white shadow-sm transition hover:bg-indigo-500 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-950">
                        Kunjungi Demo
                        <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                        </svg>
                    </a>
                @endif

                @if ($project->repo_url)
                    <a href="{{ $project->repo_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="inline-flex items-center gap-2 rounded-xl border border-gray-300 px-5 py-2.5 text-sm font-semibold text-gray-700 transition hover:border-indigo-400 hover:text-indigo-600 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:border-gray-700 dark:text-gray-200 dark:hover:border-indigo-500 dark:hover:text-indigo-400 dark:focus:ring-offset-gray-950">
                        Lihat Source Code
                    </a>
                @endif
            </div>

            @if ($relatedProjects->isNotEmpty())
                <hr class="my-16 border-gray-200 dark:border-gray-800">

                <section class="reveal">
                    <h2 class="text-xl font-bold text-gray-900 dark:text-white">Proyek Lainnya</h2>
                    <div class="mt-6 grid gap-8 sm:grid-cols-2 lg:grid-cols-3">
                        @foreach ($relatedProjects as $related)
                            <x-project-card :project="$related" />
                        @endforeach
                    </div>
                </section>
            @endif
        </article>
    </div>
@endsection
