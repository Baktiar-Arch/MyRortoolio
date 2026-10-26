@props(['name', 'level' => null])

<span {{ $attributes->merge(['class' => 'inline-flex items-center rounded-md border border-gray-200 px-2.5 py-1 text-xs font-medium text-gray-700 dark:border-gray-700 dark:text-gray-300']) }}>
    {{ $name }}
</span>
