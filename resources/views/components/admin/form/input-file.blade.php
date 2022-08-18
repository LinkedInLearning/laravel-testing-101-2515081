@props([
    'id' => $name,
    'name' => $name,
    'value' => $value,
])
<x-admin.form.group class="flex items-center">
    @if($value != null && Storage::exists('clients/' . $value))
        <img class="h-20 w-20 object-cover rounded-full mr-4" src="{{ Storage::url('clients/' . $value) }}"
    @endif

    <x-admin.form.label class="block" for="{{ $name }}">
        <span class="sr-only">{{ $slot }}</span>
        <input type="file" class="form-input rounded border-gray-200 file:mr-4 file:py-2 file:px-4
      file:rounded-full file:border-0
      file:text-sm file:font-semibold
      file:bg-slate-50 file:text-slate-700
      hover:file:bg-slate-100" id="{{ $id }}" name="{{ $name }}"
               value="{{ $value }}">
    </x-admin.form.label>


</x-admin.form.group>
