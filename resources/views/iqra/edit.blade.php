<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
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
                            <x-select id="siswa_id" name="siswa_id" class="block w-full mt-1" required autofocus>
                                <option value="" disabled>Pilih Nama Siswa</option>
                                @foreach ($siswas as $siswa)
                                    <option value="{{ $siswa->id }}" {{ $iqra->siswa_id == $siswa->id ? 'selected' : '' }}>{{ $siswa->nama }}</option>
                                @endforeach
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('siswa_id')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="jilid" :value="__('Jilid')" />
                            <x-select id="jilid" name="jilid" class="block w-full mt-1" required>
                                <option value="" disabled>Pilih Jilid</option>
                                <option value="1" {{ (old('jilid') ?? $iqra->jilid) == '1' ? 'selected' : '' }}>Jilid 1</option>
                                <option value="2" {{ (old('jilid') ?? $iqra->jilid) == '2' ? 'selected' : '' }}>Jilid 2</option>
                                <option value="3" {{ (old('jilid') ?? $iqra->jilid) == '3' ? 'selected' : '' }}>Jilid 3</option>
                                <option value="4" {{ (old('jilid') ?? $iqra->jilid) == '4' ? 'selected' : '' }}>Jilid 4</option>
                                <option value="5" {{ (old('jilid') ?? $iqra->jilid) == '5' ? 'selected' : '' }}>Jilid 5</option>
                                <option value="6" {{ (old('jilid') ?? $iqra->jilid) == '6' ? 'selected' : '' }}>Jilid 6</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('jilid')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="halaman" :value="__('Halaman')" />
                            <x-text-input id="halaman" name="halaman" type="text" class="block w-full mt-1" :value="old('halaman', $iqra->halaman)" required />
                            <x-input-error class="mt-2" :messages="$errors->get('halaman')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="nilai" :value="__('Nilai')" />
                            <x-select id="nilai" name="nilai" class="block w-full mt-1" required>
                                <option value="" disabled {{ (old('nilai') ?? $iqra->nilai) == '' ? 'selected' : '' }}>Masukkan Nilai</option>
                                <option value="Belum mampu" {{ (old('nilai') ?? $iqra->nilai) == 'Belum mampu' ? 'selected' : '' }}>Belum mampu</option>
                                <option value="Cukup" {{ (old('nilai') ?? $iqra->nilai) == 'Cukup' ? 'selected' : '' }}>Cukup</option>
                                <option value="Mampu" {{ (old('nilai') ?? $iqra->nilai) == 'Mampu' ? 'selected' : '' }}>Mampu</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('nilai')" />
                        </div>

                        <div class="mb-6">
                            <x-input-label for="catatan" :value="__('Catatan')" />
                            <x-text-input id="catatan" name="catatan" type="text" class="block w-full mt-1" :value="old('catatan', $iqra->catatan)" />
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
        $(document).ready(function() {
            $('#siswa_id').select2({
                allowClear: true,
                width: '100%',
            });
        });
    </script>
</x-app-layout>
