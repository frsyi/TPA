<x-app-layout>
    <x-slot name="header">
        <h2 class="text-xl font-semibold leading-tight text-white dark:text-gray-200">
            {{ __('Edit Orangtua') }}
        </h2>
    </x-slot>

    <div class="py-8">
        <div class="mx-auto max-w-7xl sm:px-6 lg:px-8">
            <div class="overflow-hidden bg-white shadow-sm dark:bg-gray-800 sm:rounded-lg">
                <div class="p-6 text-gray-900 dark:text-gray-100">
                    <form method="post" action="{{ route('orangtua.update', $orangtua->id) }}" class="">
                        @csrf
                        @method('patch')
                        <div class="mb-4">
                            <x-input-label for="name" :value="__('Nama')" />
                            <x-text-input id="name" class="block w-full mt-1" type="text" name="name" :value="old('name', $orangtua->name)" required autofocus />
                            <x-input-error :messages="$errors->get('name')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="phone_number" :value="__('No Telpon')" />
                            <x-text-input id="phone_number" class="block w-full mt-1" type="text" name="phone_number" :value="old('phone_number', $orangtua->phone_number)" />
                            <x-input-error :messages="$errors->get('phone_number')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="siswa_id" :value="__('Nama Siswa')" />
                            <x-select name="siswa_id" id="siswa_id" class="block w-full mt-1" required>
                                <option value="">Pilih Siswa</option>
                                @foreach($siswas as $siswa)
                                <option value="{{ $siswa->id }}" {{ old('siswa_id', $orangtua->siswa_id) == $siswa->id ? 'selected' : '' }}>
                                    {{ $siswa->nama }}
                                </option>
                                @endforeach
                            </x-select>
                            <x-input-error :messages="$errors->get('siswa_id')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="username" :value="__('Username')" />
                            <x-text-input id="username" class="block w-full mt-1" type="text" name="username" :value="old('username', $orangtua->username)" required />
                            <x-input-error :messages="$errors->get('username')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="password" :value="__('Password (Biarkan kosong jika tidak ingin mengubah)')" />
                            <x-text-input
                                id="password"
                                class="block w-full mt-1"
                                type="password"
                                name="password" />
                            <x-input-error :messages="$errors->get('password')" class="mt-2" />
                        </div>
                        <div class="mb-4">
                            <x-input-label for="password_confirmation" :value="__('Konfirmasi Password')" />

                            <x-text-input id="password_confirmation" class="block w-full mt-1"
                                            type="password"
                                            name="password_confirmation" />

                            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
                        </div>
                        <div class="flex items-center gap-4">
                            <x-primary-button>{{ __('Simpan') }}</x-primary-button>
                            <a href="{{ route('orangtua.index') }}" class="inline-flex items-center px-4 py-2 text-xs font-semibold tracking-widest text-gray-700 uppercase transition duration-150 ease-in-out bg-white border border-gray-300 rounded-md shadow-sm dark:bg-gray-800 dark:border-gray-500 dark:text-gray-300 hover:bg-gray-50 dark:hover:bg-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-500 focus:ring-offset-2 dark:focus:ring-offset-gray-800 disabled:opacity-25">{{ __('Batal') }}</a>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</x-app-layout>
