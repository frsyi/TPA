<x-app-layout>
    <x-slot name="header">
        <div class="flex items-center">
            <a href="{{ route('siswa.index') }}" class="mr-4 text-gray-700 dark:text-gray-300 hover:text-gray-900 dark:hover:text-white">
                <x-heroicon-o-arrow-left class="w-5 h-5" />
            </a>
            <h2 class="text-xl font-semibold leading-tight text-gray-800 dark:text-gray-200">
                {{ __('Tambah Siswa') }}
            </h2>
        </div>
    </x-slot>

    <div class="py-12">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('siswa.store') }}" class="">
                        @csrf
                        @method('post')
                        <div class="mb-6">
                            <x-input-label for="nama" :value="__('Nama Siswa')" />
                            <x-text-input id="nama" name="nama" type="text" class="block w-full mt-1" required autofocus />
                            <x-input-error class="mt-2" :messages="$errors->get('nama')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="jenis_kelamin" :value="__('Jenis Kelamin')" />
                            <x-select id="jenis_kelamin" name="jenis_kelamin" class="block w-full mt-1" required>
                                <option value="" disabled selected>Pilih Jenis Kelamin</option>
                                <option value="Laki-laki">Laki-laki</option>
                                <option value="Perempuan">Perempuan</option>
                            </x-select>
                            <x-input-error class="mt-2" :messages="$errors->get('jenis_kelamin')" />
                        </div>
                        <div class="mb-6">
                            <x-input-label for="kelas" :value="__('Kelas')" />
                            <x-text-input id="kelas" name="kelas" type="text" class="block w-full mt-1" required />
                            <x-input-error class="mt-2" :messages="$errors->get('kelas')" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            <a href="{{ route('siswa.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
