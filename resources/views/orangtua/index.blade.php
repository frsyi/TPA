<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Orangtua') }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:shadow-sm sm:rounded-lg">
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-create-button href="{{ route('orangtua.create') }}" />
                        </div>
                        <div>
                            @if (session('success'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-green-600 dark:text-green-400">{{ session('success') }}
                                </p>
                            @endif
                            @if (session('danger'))
                                <p x-data="{ show: true }" x-show="show" x-transition x-init="setTimeout(() => show = false, 5000)"
                                    class="text-sm text-red-600 dark:text-red-400">{{ session('danger') }}
                                </p>
                            @endif
                        </div>
                    </div>
                </div>

                <div class="p-6">
                    <form method="GET" action="{{ route('orangtua.index') }}">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari berdasarkan nama orangtua atau nama siswa"
                                    class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                            </div>
                            <div>
                                <button type="submit"
                                    class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg dark:bg-blue-600 hover:bg-gray-700 dark:hover:bg-blue-700">
                                    Search
                                </button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Nama
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    No Telpon
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Username
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($orangtuas as $orangtua)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <p>{{ $orangtua->name }}</p>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <p>{{ $orangtua->phone_number }}</p>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <p>{{ $orangtua->siswa->nama }}</p>
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        <p>{{ $orangtua->username }}</p>
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('orangtua.show', $orangtua->id) }}" class="text-blue-600 dark:text-blue-400">
                                                <x-heroicon-o-eye class="w-6 h-6"/>
                                            </a>
                                            <a href="{{ route('orangtua.edit', $orangtua->id) }}" class="text-yellow-600 dark:text-yellow-400">
                                                <x-heroicon-o-pencil-square class="w-6 h-6"/>
                                            </a>
                                            <form action="{{ route('orangtua.destroy', $orangtua->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="flex items-center text-red-600 dark:text-red-400 delete-button">
                                                    <x-heroicon-o-trash class="w-6 h-6"/>
                                                </button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="4" class="px-6 py-4 font-medium text-center text-gray-900 dark:text-white">
                                        Belum ada data orangtua
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="flex justify-center mt-4 mb-4">
                        {{ $orangtuas->appends(['search' => request('search')])->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>

</x-app-layout>
