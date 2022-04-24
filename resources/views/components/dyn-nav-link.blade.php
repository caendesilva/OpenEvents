@props(['active'])

@php
$classes = ($active ?? false)
            ? 'inline-block w-full py-2.5 md:py-2 mx-2 px-4 md:px-2 md:mx-2 md:w-auto md:text-center text-left font-medium text-indigo-600'
            : 'inline-block w-full py-2.5 md:py-2 mx-2 px-4 md:px-2 md:mx-2 md:w-auto md:text-center text-left font-medium text-gray-700 hover:text-indigo-600';
@endphp

<li>
    <a href="{{ $href }}" {{ $attributes->merge(['class' => $classes]) }} {{ $active ? 'aria-current="page"' : '' }}>
        {{ $name }}
    </a>
</li>
