@props(['project'])

<article {{ $attributes->merge(['class' => 'group flex flex-col overflow-hidden rounded-2xl border border-gray-200 bg-white shadow-sm transition duration-300 hover:-translate-y-1 hover:shadow-xl dark:border-gray-800 dark:bg-gray-900']) }}>
    <div class="relative aspect-video overflow-hidden bg-gradient-to-br from-indigo-500/10 via-sky-500/10 to-emerald-500/10 dark:from-indigo-500/20 dark:via-sky-500/20 dark:to-emerald-500/20">
        @if ($project->thumbnail)
            <img src="{{ $project->thumbnail }}"
                 alt="Thumbnail {{ $project->title }}"
                 class="h-full w-full object-cover transition duration-300 group-hover:scale-105"
                 loading="lazy">
        @else
            <div class="flex h-full items-center justify-center">
                <svg class="h-16 w-16 text-indigo-400/60 transition duration-300 group-hover:scale-110 dark:text-indigo-500/50" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M17.25 6.75L22.5 12l-5.25 5.25m-10.5 0L1.5 12l5.25-5.25m7.5-3l-4.5 16.5" />
                </svg>
            </div>
        @endif

        <div class="absolute inset-x-3 bottom-3 flex flex-wrap gap-1.5">
            @foreach ($project->techStackList() as $tech)
                <span class="rounded-full bg-gray-950/70 px-2.5 py-0.5 text-xs font-medium text-white backdrop-blur-sm dark:bg-gray-950/80">
                    {{ $tech }}
                </span>
            @endforeach
        </div>
    </div>

    <div class="flex flex-1 flex-col p-5">
        <h3 class="text-lg font-bold text-gray-900 dark:text-white">
            {{ $project->title }}
        </h3>

        <p class="mt-2 line-clamp-3 flex-1 text-sm leading-relaxed text-gray-600 dark:text-gray-400">
            {{ $project->description }}
        </p>

        <div class="mt-5 flex items-center justify-between border-t border-gray-100 pt-4 dark:border-gray-800">
            <a href="{{ route('portfolio.show', $project) }}"
               class="inline-flex items-center gap-1.5 text-sm font-semibold text-indigo-600 transition hover:text-indigo-500 dark:text-indigo-400 dark:hover:text-indigo-300">
                Detail
                <svg class="h-4 w-4 transition-transform group-hover:translate-x-0.5" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>

            <div class="flex items-center gap-3">
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="text-sm font-medium text-gray-500 transition hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400"
                       aria-label="Demo {{ $project->title }}">
                        Demo
                    </a>
                @endif
                @if ($project->repo_url)
                    <a href="{{ $project->repo_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="text-sm font-medium text-gray-500 transition hover:text-indigo-600 dark:text-gray-400 dark:hover:text-indigo-400"
                       aria-label="Repository {{ $project->title }}">
                        Repo
                    </a>
                @endif
            </div>
        </div>
    </div>
</article>
