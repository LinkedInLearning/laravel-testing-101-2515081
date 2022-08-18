@props([
    'id' => $name,
    'name' => $name,
    'value' => $value,
])
<x-admin.form.group>
    <x-admin.form.label for="{{ $name }}">{{ $slot }}</x-admin.form.label>
    <input type="text" class="form-input rounded border-gray-200" id="{{ $id }}" name="{{ $name }}"
           value="{{ $value }}">
</x-admin.form.group>
