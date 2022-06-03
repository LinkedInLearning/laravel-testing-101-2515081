<x-app-layout>

    <x-admin.header>{{ __('Clients') }} @if(isset($client)): {{ $client->name }}@endif</x-admin.header>

    <x-admin.errors/>

    @if(isset($client))
        <form action="{{ route('admin.clients.update', $client->id) }}" method="POST">
            @method('PUT')
            @csrf
            <input type="hidden" name="id" value="{{ $client->id }}">
    @else
        <form action="{{ route('admin.clients.store') }}" method="POST">
            @csrf
    @endif
            <x-admin.form.input-text name="name" value="{{ $client->name ?? '' }}">{{ __('Name') }}</x-admin.form.input-text>
            <x-admin.form.input-text name="email" value="{{ $client->email  ?? '' }}">{{ __('Email') }}</x-admin.form.input-text>
            <x-admin.form.input-text name="phone" value="{{ $client->phone  ?? '' }}">{{ __('Phone') }}</x-admin.form.input-text>
            <x-admin.form.input-checkbox name="active" value="{{ $client->active ?? false }}">{{ __('Active') }}</x-admin.form.input-checkbox>

            <x-admin.button>{{ __('Save') }}</x-admin.button>
    </form>

</x-app-layout>
