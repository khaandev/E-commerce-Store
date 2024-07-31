@props(['active'])

@php
$classes = ($active ?? false)
            ? 'px-1 pt-1  text-sm font-medium leading-5 text-orange-600 '
            : 'px-1 pt-1  text-sm font-medium leading-5 text-gray-600 ';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
