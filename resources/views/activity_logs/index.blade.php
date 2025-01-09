<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Presensi Pengajar - ' . $monthName) }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:shadow-sm sm:rounded-lg">
                <div class="p-6">
                    <!-- Form Filter -->
                    <form method="GET" action="{{ route('activity-logs.index') }}">
                        <div class="grid grid-cols-1 gap-4 sm:grid-cols-3">
                            <div>
                                <input type="text" name="search" value="{{ request('search') }}" placeholder="Cari Nama Pengajar" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
                            </div>
                            <div>
                                <input type="month" name="date" value="{{ $date }}" class="w-full px-4 py-2 border rounded-lg dark:bg-gray-700 dark:text-gray-200">
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
                                <th scope="col" class="px-6 py-3">Pengajar</th>
                                <th scope="col" class="px-6 py-3">Jumlah Aktivitas</th>
                                <th scope="col" class="px-6 py-3">Jumlah Kehadiran Per Bulan</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logs as $log)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $log->pengajar->name ?? 'Pengajar tidak ditemukan' }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $log->total_activities }}
                                    </td>
                                    <td class="px-6 py-4 font-medium text-gray-900 dark:text-white">
                                        {{ $log->total_days }} hari
                                    </td>
                                </tr>
                            @empty
                                <tr class="bg-white dark:bg-gray-800">
                                    <td colspan="3" class="px-6 py-4 font-medium text-center text-gray-900 dark:text-white">
                                        Belum ada data log pengajar untuk bulan ini
                                    </td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>

                    <div class="flex justify-center mt-4 mb-4">
                        {{ $logs->links() }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
