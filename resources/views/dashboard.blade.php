<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            @can('admin')
            <div class="grid grid-cols-1 gap-6 mb-8 md:grid-cols-3 lg:grid-cols-4">
                <!-- Jumlah Siswa -->
                <div class="flex items-center p-6 rounded-lg shadow-lg bg-gradient-to-r from-blue-500 to-indigo-600">
                    <div class="p-4 bg-white rounded-full">
                        <svg class="w-10 h-10 text-blue-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4.26 10.147a60.438 60.438 0 0 0-.491 6.347A48.62 48.62 0 0 1 12 20.904a48.62 48.62 0 0 1 8.232-4.41 60.46 60.46 0 0 0-.491-6.347m-15.482 0a50.636 50.636 0 0 0-2.658-.813A59.906 59.906 0 0 1 12 3.493a59.903 59.903 0 0 1 10.399 5.84c-.896.248-1.783.52-2.658.814m-15.482 0A50.717 50.717 0 0 1 12 13.489a50.702 50.702 0 0 1 7.74-3.342M6.75 15a.75.75 0 1 0 0-1.5.75.75 0 0 0 0 1.5Zm0 0v-3.675A55.378 55.378 0 0 1 12 8.443m-7.007 11.55A5.981 5.981 0 0 0 6.75 15.75v-1.5"></path>
                        </svg>
                    </div>
                    <div class="ml-4 text-white">
                        <h3 class="text-lg font-semibold">Jumlah Siswa</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $jumlahSiswa }}</p>
                    </div>
                </div>

                <!-- Jumlah Pengajar -->
                <div class="flex items-center p-6 rounded-lg shadow-lg bg-gradient-to-r from-green-500 to-teal-600">
                    <div class="p-4 bg-white rounded-full">
                        <svg class="w-10 h-10 text-green-600" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M18 18.72a9.094 9.094 0 0 0 3.741-.479 3 3 0 0 0-4.682-2.72m.94 3.198.001.031c0 .225-.012.447-.037.666A11.944 11.944 0 0 1 12 21c-2.17 0-4.207-.576-5.963-1.584A6.062 6.062 0 0 1 6 18.719m12 0a5.971 5.971 0 0 0-.941-3.197m0 0A5.995 5.995 0 0 0 12 12.75a5.995 5.995 0 0 0-5.058 2.772m0 0a3 3 0 0 0-4.681 2.72 8.986 8.986 0 0 0 3.74.477m.94-3.197a5.971 5.971 0 0 0-.94 3.197M15 6.75a3 3 0 1 1-6 0 3 3 0 0 1 6 0Zm6 3a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Zm-13.5 0a2.25 2.25 0 1 1-4.5 0 2.25 2.25 0 0 1 4.5 0Z" />
                        </svg>
                    </div>
                    <div class="ml-4 text-white">
                        <h3 class="text-lg font-semibold">Jumlah Pengajar</h3>
                        <p class="mt-2 text-4xl font-bold">{{ $jumlahPengajar }}</p>
                    </div>
                </div>
            </div>
            @endcan

            <!-- Grafik Progres Hafalan -->
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-lg font-semibold">Progres Hafalan Siswa per Bulan</h3>
                    <canvas id="progressChart"></canvas>
                </div>
            </div>

            @can('admin')
            <!-- Grafik Progres Hafalan Siswa dalam Satu Bulan -->
            <div class="mt-6 overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <h3 class="mb-4 text-lg font-semibold">Progres Hafalan Siswa Bulan {{ $bulanSekarang }}</h3>
                    <canvas id="studentProgressChart"></canvas>
                </div>
            </div>
            @endcan
        </div>
    </div>

    <!-- Tambahkan Chart.js -->
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script>
        const progresHafalanBulanan = {!! $progresHafalanBulanan !!};
        const labels = progresHafalanBulanan.map(item => item.bulan);
        const hafalanData = progresHafalanBulanan.map(item => item.total_hafalan);

        const ctx = document.getElementById('progressChart').getContext('2d');

        new Chart(ctx, {
            type: 'line',
            data: {
                labels: labels,
                datasets: [{
                    label: 'Jumlah Hafalan',
                    data: hafalanData,
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    borderColor: 'rgba(75, 192, 192, 1)',
                    borderWidth: 2,
                    fill: true,
                    tension: 0.4
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value, index, values) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    },
                    x: {
                        ticks: {
                            autoSkip: false
                        }
                    }
                }
            }
        });
    </script>

    <script>
        const progresHafalanSiswa = {!! $progresHafalanSiswa !!};
        const siswaLabels = progresHafalanSiswa.map(item => item.nama_siswa);
        const hafalanSiswaData = progresHafalanSiswa.map(item => item.total_hafalan);

        const ctxSiswa = document.getElementById('studentProgressChart').getContext('2d');

        new Chart(ctxSiswa, {
            type: 'bar',
            data: {
                labels: siswaLabels,
                datasets: [{
                    label: 'Jumlah Hafalan',
                    data: hafalanSiswaData,
                    backgroundColor: 'rgba(54, 162, 235, 0.6)',
                    borderColor: 'rgba(54, 162, 235, 1)',
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        display: true,
                        position: 'top',
                        align: 'end'
                    }
                },
                scales: {
                    y: {
                        beginAtZero: true,
                        ticks: {
                            stepSize: 1,
                            callback: function(value) {
                                return Number.isInteger(value) ? value : '';
                            }
                        }
                    },
                    x: {
                        ticks: {
                            autoSkip: false
                        }
                    }
                }
            }
        });
    </script>
</x-app-layout>
