<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Iqra') }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:shadow-sm sm:rounded-lg">
                @can('admin')
                <div class="p-6 text-xl text-gray-900 dark:text-gray-100">
                    <div class="flex items-center justify-between">
                        <div>
                            <x-create-button href="{{ route('iqra.create') }}" />
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
                @endcan

                <div class="p-6">
                    <!-- Search and Filter Form -->
                    <form method="GET" action="{{ route('iqra.index') }}">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            @can('admin')
                            <div>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Siswa" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                            </div>
                            @endcan
                            <div>
                                <input type="month" name="date" value="{{ request('date') }}" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                            </div>
                            <div>
                                <button type="submit" class="w-full px-4 py-2 text-white bg-gray-800 rounded-lg dark:bg-blue-600 hover:bg-gray-700 dark: darkhover:bg-blue-700">Search</button>
                            </div>
                        </div>
                    </form>
                </div>

                <div class="relative overflow-x-auto">
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">
                                    Tanggal
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Nama Siswa
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Kelas
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Jilid
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Halaman
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Pengajar
                                </th>
                                <th scope="col" class="px-6 py-3">
                                    Action
                                </th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($iqras as $iqra)
                                <tr class="{{ $loop->odd ? 'odd:bg-white odd:dark:bg-gray-800' : 'even:bg-gray-50 even:dark:bg-gray-700' }}">
                                    <td class="px-6 py-4">
                                        {{ $iqra->created_at->format('d M Y') }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $iqra->siswa->nama }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $iqra->siswa->kelas }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $iqra->jilid }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $iqra->halaman }}
                                    </td>
                                    <td class="px-6 py-4">
                                        {{ $iqra->pengajar->name }}
                                    </td>
                                    <td class="px-6 py-4">
                                        <div class="flex space-x-3">
                                            <a href="{{ route('iqra.show', $iqra->id) }}" class="text-blue-600 dark:text-blue-400">
                                                <x-heroicon-o-eye class="w-6 h-6"/>
                                            </a>
                                            @can('admin')
                                            <a href="{{ route('iqra.edit', $iqra->id) }}" class="text-yellow-600 dark:text-yellow-400">
                                                <x-heroicon-o-pencil-square class="w-6 h-6"/>
                                            </a>
                                            <form action="{{ route('iqra.destroy', $iqra->id) }}" method="POST" class="delete-form">
                                                @csrf
                                                @method('DELETE')
                                                <button type="button" class="flex items-center text-red-600 dark:text-red-400 delete-button">
                                                    <x-heroicon-o-trash class="w-6 h-6"/>
                                                </button>
                                            </form>
                                            @endcan
                                        </div>
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="7" class="px-6 py-4 text-center text-gray-900 dark:text-white">
                                        Belum ada data iqra
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="flex justify-center mt-4 mb-4">
                        {{ $iqras->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
