<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('iqra.index') }}" class="mr-4 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                <x-heroicon-o-arrow-left class="w-5 h-5" />
            </a>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Detail Iqra') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 mb-6 text-2xl font-bold rounded-lg bg-gray-50 dark:bg-gray-700">Detail Iqra</div>
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <tbody>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Tanggal</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $iqra->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Jilid</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $iqra->jilid }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Halaman</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $iqra->halaman }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Nilai</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $iqra->nilai }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Catatan</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $iqra->catatan }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Pengajar</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $iqra->pengajar->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
