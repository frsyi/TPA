<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
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
                            <x-select id="siswa_id" name="siswa_id" class="block w-full mt-1" required autofocus autocomplete="siswa_id">
                                <option value="" disabled selected>Pilih Nama Siswa</option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}">{{ $siswa->nama }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('siswa_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="juz_id" :value="__('Juz')" />
                            <x-select id="juz_id" name="juz_id" class="block w-full mt-1" required autofocus autocomplete="juz_id">
                                <option value="" disabled selected>Pilih Juz</option>
                                @foreach ($juzs as $juz)
                                    <option value="{{ $juz->id }}">{{ $juz->juz }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('juz_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="surat_id" :value="__('Surat')" />
                            <x-select id="surat_id" name="surat_id" class="block w-full mt-1" required autofocus autocomplete="surat_id">
                                <option value="" disabled selected>Pilih Surat</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('surat_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="mulai_ayat" :value="__('Mulai Ayat')" />
                            <x-select id="mulai_ayat" name="mulai_ayat" class="block w-full mt-1" required autofocus autocomplete="mulai_ayat">
                                <option value="" disabled selected>Pilih Mulai Ayat</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('mulai_ayat')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="akhir_ayat" :value="__('Sampai Ayat')" />
                            <x-select id="akhir_ayat" name="akhir_ayat" class="block w-full mt-1" required autofocus autocomplete="akhir_ayat">
                                <option value="" disabled selected>Pilih Sampai Ayat</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('akhir_ayat')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="nilai" :value="__('Nilai')" />
                            <x-select id="nilai" name="nilai" type="text" class="block w-full mt-1" required autofocus autocomplete="nilai">
                                <option value="">Masukkan Nilai</option>
                                <option value="1">Belum mampu</option>
                                <option value="2">Cukup</option>
                                <option value="3">Mampu</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('nilai')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="catatan" :value="__('Catatan')" />
                            <x-text-input id="catatan" name="catatan" type="text" class="block w-full mt-1" required autofocus autocomplete="catatan" />
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

    <script>
        document.getElementById('juz_id').addEventListener('change', function() {
            var juzId = this.value;
            var suratSelect = document.getElementById('surat_id');
            var mulaiAyatSelect = document.getElementById('mulai_ayat');
            var akhirAyatSelect = document.getElementById('akhir_ayat');

            suratSelect.innerHTML = '<option value="" disabled selected>Pilih Surat</option>';
            mulaiAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Mulai Ayat</option>';
            akhirAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Sampai Ayat</option>';

            fetch(`/api/juzs/${juzId}/surats`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(surat => {
                        var option = document.createElement('option');
                        option.value = surat.id;
                        option.textContent = surat.nama_surat;
                        suratSelect.appendChild(option);
                    });
                })
                .catch(error => console.error('Error fetching surats:', error));
        });

        document.getElementById('surat_id').addEventListener('change', function() {
            var suratId = this.value;
            var mulaiAyatSelect = document.getElementById('mulai_ayat');
            var akhirAyatSelect = document.getElementById('akhir_ayat');

            mulaiAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Mulai Ayat</option>';
            akhirAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Sampai Ayat</option>';

            fetch(`/api/surats/${suratId}/ayats`)
                .then(response => response.json())
                .then(data => {
                    data.forEach(ayat => {
                        var optionMulai = document.createElement('option');
                        optionMulai.value = ayat;
                        optionMulai.textContent = ayat;
                        mulaiAyatSelect.appendChild(optionMulai);

                        var optionAkhir = document.createElement('option');
                        optionAkhir.value = ayat;
                        optionAkhir.textContent = ayat;
                        akhirAyatSelect.appendChild(optionAkhir);
                    });
                })
                .catch(error => console.error('Error fetching ayats:', error));
        });
    </script>
</x-app-layout>
