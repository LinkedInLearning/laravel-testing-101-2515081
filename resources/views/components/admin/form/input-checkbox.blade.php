@props([
    'id' => $name,
    'name' => $name,
    'value' => $value,
])
<x-admin.form.group class="row">

    <input type="checkbox"
           class="h-6 w-6 border-slate-700 border-2 hover:bg-slate transition duration-150 ease-in-out"
           name="{{ $name }}"
           value="active"
           @checked(old('active', $value))
    />

    <x-admin.form.label for="{{ $name }}" class="ml-3">{{ $slot }}</x-admin.form.label>

</x-admin.form.group>
