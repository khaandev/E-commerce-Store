@props(['active'])

@php
$classes = ($active ?? false)
            ? 'font-medium text-orange-600 text-lg hover:text-orange-500 '
            : 'font-medium text-gray-600  text-lg';
@endphp

<a {{ $attributes->merge(['class' => $classes]) }}>
    {{ $slot }}
</a>
