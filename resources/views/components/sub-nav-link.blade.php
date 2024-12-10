@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-flex items-center px-2 py-2 rounded bg-[#fdc02f] w-full text-sm font-medium leading-5 text-[#0047ab] focus:outline-none transition duration-150 ease-in-out'
            : 'inline-flex items-center px-2 py-2 rounded bg-transparent w-full border-transparent text-sm font-medium leading-5 text-white hover:text-[#0047ab] hover:border-gray-300 hover:bg-[#fdc02f] focus:outline-none';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
