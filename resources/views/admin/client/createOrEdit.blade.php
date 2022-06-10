<x-app-layout>

    <x-admin.header>{{ __('Clients') }} @if(isset($client)): {{ $client->name }}@endif</x-admin.header>

    <x-admin.errors/>

    @if(isset($client))
        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST" enctype="multipart/form-data">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $client->id }}">
    @else
        <form action="{{ route('admin.clients.store') }}" method="POST" enctype="multipart/form-data">
            @csrf
    @endif
            <x-admin.form.input-file name="photo" value="{{ $client->photo ?? '' }}">{{ __('Photo') }}</x-admin.form.input-file>
            <x-admin.form.input-text name="name" value="{{ old('name', $client->name ?? '') }}">{{ __('Name') }}</x-admin.form.input-text>
            <x-admin.form.input-text name="email" value="{{ old('email', $client->email  ?? '') }}">{{ __('Email') }}</x-admin.form.input-text>
            <x-admin.form.input-text name="phone" value="{{ old('phone', $client->phone  ?? '') }}">{{ __('Phone') }}</x-admin.form.input-text>
            <x-admin.form.input-checkbox name="active" value="{{ old('active', $client->active ?? false) }}">{{ __('Active') }}</x-admin.form.input-checkbox>

    @if(isset($client->file))

    @else

    @endif

            <x-admin.button>{{ __('Save') }}</x-admin.button>
    </form>

</x-app-layout>
