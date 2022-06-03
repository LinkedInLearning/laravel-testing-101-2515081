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
                    <th class="px-6 py-3">{{ __('Name') }}</th>
                    <th class="px-6 py-3">{{ __('Email') }}</th>
                    <th class="px-6 py-3">{{ __('Phone') }}</th>
                    <th class="px-6 py-3">{{ __('Active') }}</th>
                    <th class="px-6 py-3"></th>
                </tr>
                </thead>
                <tbody class="">
                @endif
                <tr class="hover:bg-gray-50 dark:hover:bg-gray-600 {{ $client->active ? '' : 'text-gray-400' }}">
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="hover:cursor-pointer hover:underline">
                            {{ $client->name }}
                        </a>
                    </td>
                    <td class="px-6 py-3">{{ $client->email }}</td>
                    <td class="px-6 py-3">{{ $client->phone }}</td>
                    <td class="px-6 py-3">@if($client->active) <x-icons.check /> @else <x-icons.cross /> @endif</td>
                    <td class="px-6 py-3">
                        <a href="{{ route('admin.clients.edit', $client->id) }}" class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
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
