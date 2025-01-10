<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
                {{ __('Detail Siswa') }}
        </h2>
    </x-slot>

    <!-- Detail Siswa -->
    <div class="pt-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
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

    <!-- Filter per Bulan -->
    <div class="pt-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="p-2 text-gray-900 dark:text-gray-100">
                <form method="GET" action="{{ route('siswa.show', $siswa->id) }}" class="flex items-center mb-4 space-x-4">
                    <select name="bulan" id="bulan" class="border-gray-300 rounded-md">
                        <option value="">Semua Bulan</option>
                        @foreach (range(1, 12) as $month)
                            <option value="{{ $month }}" {{ $bulan == $month ? 'selected' : '' }}>
                                {{ DateTime::createFromFormat('!m', $month)->format('F') }}
                            </option>
                        @endforeach
                    </select>
                    <button type="submit" class="px-4 py-2 text-white bg-blue-500 rounded-md hover:bg-blue-600">Filter</button>
                </form>
            </div>
        </div>
    </div>

    <!-- Data Hafalan -->
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="text-gray-900 dark:text-gray-100">
            <div class="p-4 mb-6 text-2xl font-bold rounded-lg bg-gray-50 dark:bg-gray-700">Data Hafalan</div>
            <div class="relative overflow-x-auto">
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

            <!-- Pagination -->
            <div class="mt-4">
                {{ $hafalans->appends(['bulan' => $bulan])->links() }}
            </div>
        </div>
    </div>

    <!-- Data Iqra -->
    <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
        <div class="p-6 text-gray-900 dark:text-gray-100">
            <div class="p-4 mb-6 text-2xl font-bold rounded-lg bg-gray-50 dark:bg-gray-700">Data Iqra</div>
            <div class="relative overflow-x-auto">
                <table class="w-full text-sm text-left text-gray-500 dark:text-gray-400">
                    <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                        <tr>
                            <th scope="col" class="px-6 py-3">Tanggal</th>
                            <th scope="col" class="px-6 py-3">Jilid</th>
                            <th scope="col" class="px-6 py-3">Halaman</th>
                            <th scope="col" class="px-6 py-3">Nilai</th>
                            <th scope="col" class="px-6 py-3">Catatan</th>
                            <th scope="col" class="px-6 py-3">Pengajar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($iqras as $iqra)
                            <tr class="{{ $loop->odd ? 'bg-white dark:bg-gray-800' : 'bg-gray-50 dark:bg-gray-700' }}">
                                <td class="px-6 py-4">{{ $iqra->created_at->format('d M Y') }}</td>
                                <td class="px-6 py-4">{{ $iqra->jilid }}</td>
                                <td class="px-6 py-4">{{ $iqra->halaman }}</td>
                                <td class="px-6 py-4">{{ $iqra->nilai }}</td>
                                <td class="px-6 py-4">{{ $iqra->catatan }}</td>
                                <td class="px-6 py-4">{{ $iqra->pengajar->name }}</td>
                            </tr>
                        @empty
                            <tr class="bg-white dark:bg-gray-800">
                                <td colspan="6" class="px-6 py-4 text-center text-gray-900 dark:text-white">Belum ada data Iqra</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</x-app-layout>
