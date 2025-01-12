<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Tambah Hafalan') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('hafalan.store') }}" class="">
                        @csrf
                        @method('post')

                        <div class="mb-6">
                            <x-input-label for="siswa_id" :value="__('Nama Siswa')" />
                            <x-select id="siswa_id" name="siswa_id" class="block w-full mt-1 select2 " autofocus required>
                                <option value="">Cari Nama Siswa</option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('siswa_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="juz_id" :value="__('Juz')" />
                            <x-select id="juz_id" name="juz_id" class="block w-full mt-1" required>
                                <option value="" disabled selected>Pilih Juz</option>
                                @foreach ($juzs as $juz)
                                    <option value="{{ $juz->id }}">{{ $juz->juz }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('juz_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="surat_id" :value="__('Surat')" />
                            <x-select id="surat_id" name="surat_id" class="block w-full mt-1" required>
                                <option value="" disabled selected>Pilih Surat</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('surat_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="mulai_ayat" :value="__('Mulai Ayat')" />
                            <x-select id="mulai_ayat" name="mulai_ayat" class="block w-full mt-1" required>
                                <option value="" disabled selected>Pilih Ayat</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('mulai_ayat')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="akhir_ayat" :value="__('Sampai Ayat')" />
                            <x-select id="akhir_ayat" name="akhir_ayat" class="block w-full mt-1">
                                <option value="" disabled selected>Pilih Ayat</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('akhir_ayat')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="nilai" :value="__('Nilai')" />
                            <x-select id="nilai" name="nilai" type="text" class="block w-full mt-1" required>
                                <option value="">Masukkan Nilai</option>
                                <option value="Belum mampu">Belum mampu</option>
                                <option value="Cukup">Cukup</option>
                                <option value="Mampu">Mampu</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('nilai')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="catatan" :value="__('Catatan')" />
                            <x-text-input id="catatan" name="catatan" type="text" class="block w-full mt-1"/>
                            <x-input-error class="mt-2" :messages="$errors->get('catatan')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            <a href="{{ route('hafalan.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function () {
            // $('#siswa_id').select2();

            $('#juz_id').change(function () {
                let juzId = $(this).val();
                $('#surat_id').html('<option value="" disabled selected>Memuat...</option>');

                if (juzId) {
                    $.ajax({
                        url: `/hafalan/surats/${juzId}`,
                        type: 'GET',
                        success: function (data) {
                            let options = '<option value="" disabled selected>Pilih Surat</option>';
                            data.forEach(surat => {
                                options += `<option value="${surat.id}">${surat.nama_surat}</option>`;
                            });
                            $('#surat_id').html(options);
                        }
                    });
                }
            });

            $('#surat_id').change(function () {
                let suratId = $(this).val();
                $('#mulai_ayat').html('<option value="" disabled selected>Memuat...</option>');
                $('#akhir_ayat').html('<option value="" disabled selected>Memuat...</option>');

                if (suratId) {
                    $.ajax({
                        url: `/hafalan/ayats/${suratId}`,
                        type: 'GET',
                        success: function (data) {
                            let options = '<option value="" disabled selected>Pilih Ayat</option>';
                            data.forEach(ayat => {
                                options += `<option value="${ayat}">${ayat}</option>`;
                            });
                            $('#mulai_ayat').html(options);
                            $('#akhir_ayat').html(options);
                        }
                    });
                }
            });
        });
    </script>
</x-app-layout>
