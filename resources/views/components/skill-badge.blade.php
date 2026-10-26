@props(['name', 'level' => null])

<span {{ $attributes->merge(['class' => 'inline-flex items-center gap-2 rounded-full border border-indigo-100 bg-indigo-50 px-3.5 py-1.5 text-sm font-medium text-indigo-700 dark:border-indigo-500/20 dark:bg-indigo-500/10 dark:text-indigo-300']) }}>
    {{ $name }}

    @if ($level !== null)
        <span class="text-xs font-semibold text-indigo-500/80 dark:text-indigo-400/80">
            {{ $level }}%
        </span>
    @endif
</span>
