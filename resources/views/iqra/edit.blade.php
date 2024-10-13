<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
            {{ __('Edit Iqra') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('iqra.update', $iqra->id) }}" class="">
                        @csrf
                        @method('patch')

                        <div class="mb-6">
                            <x-input-label for="siswa_id" :value="__('Nama Siswa')" />
                            <x-select id="siswa_id" name="siswa_id" class="block w-full mt-1" required autofocus autocomplete="siswa_id">
                                <option value="" disabled>Pilih Nama Siswa</option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}" {{ $iqra->siswa_id == $siswa->id ? 'selected' : '' }}>{{ $siswa->nama }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('siswa_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jilid" :value="__('Jilid')" />
                            <x-text-input id="jilid" name="jilid" type="text" class="block w-full mt-1" :value="old('jilid', $iqra->jilid)" required autofocus autocomplete="jilid" />
                            <x-input-error class="mt-2" :messages="$errors->get('jilid')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="halaman" :value="__('Halaman')" />
                            <x-text-input id="halaman" name="halaman" type="text" class="block w-full mt-1" :value="old('halaman', $iqra->halaman)" required autofocus autocomplete="halaman" />
                            <x-input-error class="mt-2" :messages="$errors->get('halaman')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="nilai" :value="__('Nilai')" />
                            <x-text-input id="nilai" name="nilai" type="text" class="block w-full mt-1" :value="old('nilai', $iqra->nilai)" required autofocus autocomplete="nilai" />
                            <x-input-error class="mt-2" :messages="$errors->get('nilai')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="catatan" :value="__('Catatan')" />
                            <x-text-input id="catatan" name="catatan" type="text" class="block w-full mt-1" :value="old('catatan', $iqra->catatan)" autofocus autocomplete="catatan" />
                            <x-input-error class="mt-2" :messages="$errors->get('catatan')" />
                        </div>

                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            <a href="{{ route('iqra.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Batal') }}</a>
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

            // Clear existing options
            suratSelect.innerHTML = '<option value="" disabled selected>Pilih Surat</option>';
            mulaiAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Mulai Ayat</option>';
            akhirAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Sampai Ayat</option>';

            // Fetch surat options based on juzId via Ajax
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

            // Clear existing options
            mulaiAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Mulai Ayat</option>';
            akhirAyatSelect.innerHTML = '<option value="" disabled selected>Pilih Sampai Ayat</option>';

            // Fetch ayat options based on suratId via Ajax
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
