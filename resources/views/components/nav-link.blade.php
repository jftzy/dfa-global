@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-2 py-2 rounded bg-gray-100 w-full text-sm font-medium leading-5 text-gray-600 focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-sm font-medium leading-5 text-gray-500 hover:text-gray-700 hover:border-gray-300 hover:bg-gray-100 focus:outline-none transition duration-150 ease-in-out hover:scale-105';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
