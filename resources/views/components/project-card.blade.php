@props(['project'])

<article {{ $attributes->merge(['class' => 'group relative flex flex-col overflow-hidden rounded-3xl border border-gray-200 bg-white transition duration-300 hover:-translate-y-1 hover:border-gray-300 hover:shadow-[0_80px_140px_-90px_rgba(15,23,42,0.9)] dark:border-gray-800 dark:bg-gray-900 dark:hover:border-gray-700']) }}>
    <div class="relative aspect-[16/9] overflow-hidden">
        @if ($project->thumbnail)
            <img src="{{ $project->thumbnail }}"
                 alt="{{ $project->title }}"
                 class="h-full w-full object-cover transition duration-500 group-hover:scale-[1.02]"
                 loading="lazy">
        @else
            <div class="flex h-full items-center justify-center bg-gradient-to-br from-gray-100 to-gray-50 dark:from-gray-900 dark:to-gray-950">
                <svg class="h-12 w-12 text-gray-400 dark:text-gray-600" fill="none" viewBox="0 0 24 24" stroke-width="1.2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M6.75 7.5l3 2.25-3 2.25m4.5 0h3m-9 8.25h13.5A2.25 2.25 0 0021 18V6a2.25 2.25 0 00-2.25-2.25H5.25A2.25 2.25 0 003 6v12a2.25 2.25 0 002.25 2.25z" />
                </svg>
            </div>
        @endif
        <div class="absolute inset-x-0 bottom-0 h-24 bg-gradient-to-t from-white via-white/80 to-transparent dark:from-gray-900 dark:via-gray-900/80"></div>
    </div>

    <div class="flex flex-1 flex-col gap-6 p-6 sm:p-8">
        <div class="flex flex-col gap-3">
            <div class="flex flex-wrap items-center gap-2">
                <span class="rounded-full border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-600 dark:border-gray-700 dark:text-gray-300">Backend Architecture</span>
                <span class="rounded-full border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-600 dark:border-gray-700 dark:text-gray-300">RESTful API</span>
                <span class="rounded-full border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-600 dark:border-gray-700 dark:text-gray-300">Database Design & Optimization</span>
            </div>
            <h3 class="text-2xl font-semibold tracking-tight text-gray-900 dark:text-white">
                {{ $project->title }}
            </h3>
            <p class="text-base leading-relaxed text-gray-600 dark:text-gray-400">
                {{ $project->description }}
            </p>
        </div>

        <div class="flex flex-wrap items-center gap-2">
            @foreach ($project->techStackList() as $tech)
                <x-skill-badge :name="$tech" />
            @endforeach
        </div>

        <div class="mt-auto flex flex-wrap items-center justify-between gap-4 border-t border-gray-100 pt-6 dark:border-gray-800">
            <a href="{{ route('portfolio.show', $project) }}"
               class="inline-flex items-center gap-2 text-sm font-semibold text-gray-900 transition hover:gap-2.5 dark:text-white">
                Baca detail
                <svg class="h-4 w-4" fill="none" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" d="M13.5 4.5L21 12m0 0l-7.5 7.5M21 12H3" />
                </svg>
            </a>
            <div class="flex items-center gap-4 text-sm">
                @if ($project->repo_url)
                    <a href="{{ $project->repo_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="font-medium text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        Repository
                    </a>
                @endif
                @if ($project->demo_url)
                    <a href="{{ $project->demo_url }}"
                       target="_blank"
                       rel="noopener noreferrer"
                       class="font-medium text-gray-600 transition hover:text-gray-900 dark:text-gray-400 dark:hover:text-white">
                        Live
                    </a>
                @endif
            </div>
        </div>
    </div>
</article>
