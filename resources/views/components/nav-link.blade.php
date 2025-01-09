@props(['active'])

@php
$classes = ($active ?? false)
            ? 'block w-full px-4 py-2 mt-2 text-sm font-semibold text-gray-900 bg-white rounded-lg hover:bg-gray-200 dark:hover:bg-gray-700 dark:text-white focus:outline-none focus:shadow-outline'
            : 'block w-full px-4 py-2 mt-2 text-sm font-semibold text-white bg-primary rounded-lg focus:outline-none focus:shadow-outline';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
