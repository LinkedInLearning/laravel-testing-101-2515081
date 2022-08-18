@props(['active', 'href'])

@php
$classes = '';

if($active) {
    $classes = 'underline';
}

@endphp

<a class="text-slate-100 hover:text-slate-400 hover:font-bold py-2 px-5 block {{ $classes }}" href="{{ $href }}">
    {{ $slot }}
</a>
