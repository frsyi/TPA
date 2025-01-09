<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
                {{ __('Detail Hafalan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-4xl mx-auto sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-md dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="pb-2 mb-4 text-xl font-semibold text-center border-b border-gray-300 dark:border-gray-700">
                        Detail Hafalan
                    </div>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-y-4 gap-x-8">
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Tanggal</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->created_at->format('d M Y') }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Juz</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->juz->juz }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Surat</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->surat->nama_surat }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Mulai Ayat</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->mulai_ayat }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Sampai Ayat</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->akhir_ayat }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Nilai</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->nilai }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Catatan</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->catatan }}</p>
                        </div>
                        <div>
                            <p class="text-sm font-medium text-gray-600 dark:text-gray-400">Pengajar</p>
                            <p class="text-base font-semibold text-gray-900 dark:text-gray-200">{{ $hafalan->pengajar->name }}</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
