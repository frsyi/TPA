<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('siswa.index') }}" class="mr-4 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                <x-heroicon-o-arrow-left class="w-5 h-5" />
            </a>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Detail Siswa') }}
            </h2>
        </div>
    </x-slot>

    <!-- Detail Siswa -->
    <div class="pt-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <div class="p-4 mb-6 text-2xl font-bold rounded-lg bg-gray-50 dark:bg-gray-700">Detail Siswa</div>
                    <table class="min-w-full bg-white dark:bg-gray-800">
                        <tbody>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Nama</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $siswa->nama }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Jenis Kelamin</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $siswa->jenis_kelamin }}</td>
                            </tr>
                            <tr class="dark:border-gray-700">
                                <td class="px-6 py-4 text-lg font-bold text-gray-900 whitespace-nowrap dark:text-gray-200">Kelas</td>
                                <td class="px-6 py-4 text-lg text-gray-900 whitespace-nowrap dark:text-gray-200">{{ $siswa->kelas }}</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

    <!-- Data Hafalan -->
    <div class="pt-4">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-6 text-gray-900 dark:text-gray-100">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Juz</th>
                            <th scope="col" class="px-6 py-3">Surat</th>
                            <th scope="col" class="px-6 py-3">Mulai Ayat</th>
                            <th scope="col" class="px-6 py-3">Sampai Ayat</th>
                            <th scope="col" class="px-6 py-3">Nilai</th>
                            <th scope="col" class="px-6 py-3">Catatan</th>
                            <th scope="col" class="px-6 py-3">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($hafalans as $hafalan)
                            <tr class="{{ $loop->odd ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">
                                <td class="px-6 py-4">{{ $hafalan->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $hafalan->juz->juz }}</td>
                                <td class="px-6 py-4">{{ $hafalan->surat->nama_surat }}</td>
                                <td class="px-6 py-4">{{ $hafalan->mulai_ayat }}</td>
                                <td class="px-6 py-4">{{ $hafalan->akhir_ayat }}</td>
                                <td class="px-6 py-4">{{ $hafalan->nilai }}</td>
                                <td class="px-6 py-4">{{ $hafalan->catatan }}</td>
                                <td class="px-6 py-4">{{ $hafalan->pengajar->name }}</td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="8" class="px-6 py-4 text-center text-gray-900 dark:text-white">Belum ada data hafalan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
