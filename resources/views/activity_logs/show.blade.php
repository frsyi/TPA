<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Detail Aktivitas Pengajar - ' . $currentMonth ) }}
        </h2>
    </x-slot>

    <div class="sm:py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white dark:bg-gray-800 sm:shadow-sm sm:rounded-lg">
                <div class="p-6 dark:text-white">
                    <p class="text-lg"><strong>Nama:</strong> {{ $pengajar->name }}</p>
                    <p class="text-lg"><strong>Username:</strong> {{ $pengajar->username }}</p>
                </div>

                <div class="relative overflow-x-auto">
                    <h3 class="px-6 py-4 text-lg font-bold text-gray-900 dark:text-white">Log Aktivitas</h3>
                    <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                        <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                            <tr>
                                <th scope="col" class="px-6 py-3">Tanggal</th>
                                <th scope="col" class="px-6 py-3">Aktivitas</th>
                            </tr>
                        </thead>
                        <tbody>
                            @forelse ($logs as $log)
                                <tr class="odd:bg-white odd:dark:bg-gray-800 even:bg-gray-50 even:dark:bg-gray-700">
                                    <td class="px-6 py-4">{{ $log->created_at->format('d-m-Y') }}</td>
                                    <td class="px-6 py-4">{{ $log->activity }}</td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="3" class="px-6 py-4 text-center">Tidak ada data aktivitas</td>
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
