<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Detail Hafalan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="mb-6 text-2xl font-bold">Detail Hafalan</div>
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <tbody>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Tanggal</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->created_at->format('d M Y') }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Juz</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->juz->juz }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Surat</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->surat->nama_surat }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Mulai Ayat</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->mulai_ayat }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Sampai Ayat</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->akhir_ayat }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Nilai</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->nilai }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Catatan</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->catatan }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Pengajar</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $hafalan->pengajar->name }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
