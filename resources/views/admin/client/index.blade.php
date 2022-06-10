<x-app-layout>

    <x-admin.header>{{ __('Clients') }}</x-admin.header>
    <x-admin.buttons>
        <x-admin.button-outline href="{{ route('admin.clients.create') }}">
            {{ __('New client') }}
        </x-admin.button-outline>
    </x-admin.buttons>

    @forelse($clients as $client)
        @if($loop->first)
            <table class="table-auto w-full">
                <thead class="">
                <tr class="border-b text-left">
                    <th class="px-6 py-3"></th>
                    <th class="px-6 py-3">{{ __('Name') }}</th>
                    <th class="px-6 py-3">{{ __('Email') }}</th>
                    <th class="px-6 py-3">{{ __('Phone') }}</th>
                    <th class="px-6 py-3">{{ __('Active') }}</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="">
                @endif
                <tr class="hover:bg-gray-50 {{ $client->active ? 'text-slate-800' : 'text-slate-400' }}">
                    <td>@if($client->photo)
                            <a href="{{ route('admin.clients.edit', $client->id) }}" class="hover:cursor-pointer hover:underline">
                                <img class="w-10 h-10 rounded-full" src="{{ Storage::url('clients/' . $client->photo) }}">
                            </a>
                        @endif
                    </td>
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="hover:cursor-pointer hover:underline">
                            {{ $client->name }}
                        </a>
                    </td>
                    <td class="px-6 py-3">{{ $client->email }}</td>
                    <td class="px-6 py-3">{{ $client->phone }}</td>
                    <td class="px-6 py-3">@if($client->active) <x-icons.check /> @else <x-icons.cross /> @endif</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="w-40 px-2 py-1 rounded text-sm text-white bg-slate-700 hover:text-slate-200">Edit</a>
                        <form action="{{ route('admin.clients.destroy', $client) }}" method="POST" class="inline-block">
                            @method('DELETE')
                            @csrf
                            <button type="submit" class="ml-3 px-2 py-1 rounded  text-sm text-slate-600 hover:text-slate-500">Delete</button>
                    </td>
                </tr>

                @if($loop->last)
                </tbody>
            </table>
        @endif
    @empty
        <p>No clients found</p>
    @endforelse

    {{ $clients->links() }}
</x-app-layout>
