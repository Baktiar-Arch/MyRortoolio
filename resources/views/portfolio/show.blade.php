@extends('layouts.app')

@section('title', $project->title . ' — ' . config('portfolio.owner'))

@section('content')
    <div class="pt-16">
        <article class="mx-auto max-w-5xl px-4 py-16 sm:px-6 lg:px-8">
            <div class="reveal">
                <a href="{{ route('portfolio.index') }}#projects"
                   class="inline-flex items-center gap-1.5 text-sm font-medium text-gray-500 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" d="M10.5 19.5L3 12m0 0l7.5-7.5M3 12h18" />
                    </svg>
                    Kembali ke proyek
                </a>

                <div class="mt-8 flex flex-col gap-6 lg:flex-row lg:items-end lg:justify-between">
                    <div>
                        <div class="flex flex-wrap items-center gap-2">
                            <span class="rounded-full border border-emerald-200 px-2.5 py-1 text-xs font-medium text-emerald-700 dark:border-emerald-500/40 dark:text-emerald-300">Aktif</span>
                            <span class="rounded-full border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-600 dark:border-gray-700 dark:text-gray-300">Backend Architecture</span>
                            <span class="rounded-full border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-600 dark:border-gray-700 dark:text-gray-300">RESTful API</span>
                            <span class="rounded-full border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-600 dark:border-gray-700 dark:text-gray-300">Database Design & Optimization</span>
                        </div>
                        <h1 class="mt-4 text-3xl font-semibold tracking-tight text-gray-900 sm:text-4xl lg:text-5xl dark:text-white">
                            {{ $project->title }}
                        </h1>
                        <p class="mt-4 max-w-3xl text-lg leading-relaxed text-gray-600 dark:text-gray-400">
                            Sistem berbasis Laravel untuk alur bisnis nyata — dari transaksi, inventori, hingga pelaporan.
                        </p>
                    </div>
                    <div class="flex flex-wrap gap-2">
                        @foreach ($project->techStackList() as $tech)
                            <x-skill-badge :name="$tech" />
                        @endforeach
                    </div>
                </div>
            </div>

            <div class="reveal mt-12 overflow-hidden rounded-3xl border border-gray-200 shadow-[0_80px_160px_-100px_rgba(15,23,42,0.9)] dark:border-gray-800">
                @if ($project->thumbnail)
                    <img src="{{ $project->thumbnail }}" alt="Tampilan {{ $project->title }}" class="h-auto w-full object-cover">
                @else
                    <div class="flex aspect-video items-center justify-center bg-gradient-to-br from-gray-100 to-gray-50 dark:from-gray-900 dark:to-gray-950">
                        <svg class="h-16 w-16 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" />
                        </svg>
                    </div>
                @endif
            </div>

            <div class="reveal mt-12 grid gap-10 lg:grid-cols-[1fr_320px]">
                <div>
                    <h2 class="text-lg font-semibold text-gray-900 dark:text-white">Gambaran</h2>
                    <div class="mt-4 space-y-4 text-base leading-relaxed text-gray-600 dark:text-gray-400">
                        @foreach (preg_split('/\R{2,}/', trim($project->description)) as $paragraph)
                            <p>{{ $paragraph }}</p>
                        @endforeach
                    </div>
                </div>
                <aside class="space-y-6 rounded-3xl border border-gray-200 p-6 dark:border-gray-800">
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Aksi</p>
                        <div class="mt-3 flex flex-col gap-3">
                            @if ($project->repo_url)
                                <a href="{{ $project->repo_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center justify-between rounded-full border border-gray-300 px-4 py-2 text-sm font-semibold text-gray-900 transition hover:border-gray-400 dark:border-gray-700 dark:text-white dark:hover:border-gray-500">
                                    Repository
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </a>
                            @endif
                            @if ($project->demo_url)
                                <a href="{{ $project->demo_url }}"
                                   target="_blank"
                                   rel="noopener noreferrer"
                                   class="inline-flex items-center justify-between rounded-full bg-gray-900 px-4 py-2 text-sm font-semibold text-white transition hover:bg-gray-800 dark:bg-white dark:text-gray-900 dark:hover:bg-gray-100">
                                    Live Demo
                                    <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                                        <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 6H5.25A2.25 2.25 0 003 8.25v10.5A2.25 2.25 0 005.25 21h10.5A2.25 2.25 0 0018 18.75V10.5m-10.5 6L21 3m0 0h-5.25M21 3v5.25" />
                                    </svg>
                                </a>
                            @endif
                        </div>
                    </div>
                    <div>
                        <p class="text-sm font-medium text-gray-500 dark:text-gray-400">Teknologi</p>
                        <div class="mt-3 flex flex-wrap gap-2">
                            @foreach ($project->techStackList() as $tech)
                                <span class="rounded-md border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-700 dark:border-gray-700 dark:text-gray-300">{{ $tech }}</span>
                            @endforeach
                        </div>
                    </div>
                </aside>
            </div>

            @if ($relatedProjects->isNotEmpty())
                <hr class="my-16 border-gray-200 dark:border-gray-800">

                <section class="reveal">
                    <div class="flex items-end justify-between">
                        <div>
                            <p class="text-sm font-semibold uppercase tracking-[0.4em] text-indigo-600 dark:text-indigo-400">Lainnya</p>
                            <h2 class="mt-3 text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">Proyek lain</h2>
                        </div>
                    </div>
                    <div class="mt-8 grid gap-8 lg:grid-cols-2">
                        @foreach ($relatedProjects as $related)
                            <x-project-card :project="$related" />
                        @endforeach
                    </div>
                </section>
            @endif
        </article>
    </div>
@endsection
