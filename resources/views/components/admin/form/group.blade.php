@props([
    'class' => 'flex-col',
])

<div class="flex {{ $class }} mb-6">
    {{ $slot }}
</div>
