<div class="flex h-screen" x-data="{ open: false }">
    <!-- Sidebar -->
    <div :class="{ 'translate-x-0': open, '-translate-x-full': !open }"
        class="fixed inset-y-0 left-0 z-30 w-64 transition-transform duration-300 ease-in-out transform bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700">
        <div class="flex items-center justify-between px-4 py-4">
            <!-- Logo -->
            <a href="{{ route('dashboard') }}">
                <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 640 512">
                    <path fill="#88C273"
                        d="M400 0c5 0 9.8 2.4 12.8 6.4c34.7 46.3 78.1 74.9 133.5 111.5c0 0 0 0 0 0s0 0 0 0c5.2 3.4 10.5 7 16 10.6c28.9 19.2 45.7 51.7 45.7 86.1c0 28.6-11.3 54.5-29.8 73.4l-356.4 0c-18.4-19-29.8-44.9-29.8-73.4c0-34.4 16.7-66.9 45.7-86.1c5.4-3.6 10.8-7.1 16-10.6c0 0 0 0 0 0s0 0 0 0C309.1 81.3 352.5 52.7 387.2 6.4c3-4 7.8-6.4 12.8-6.4zM288 512l0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-48 0c-17.7 0-32-14.3-32-32l0-128c0-17.7 14.3-32 32-32l416 0c17.7 0 32 14.3 32 32l0 128c0 17.7-14.3 32-32 32l-48 0 0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-64 0 0-58c0-19-8.4-37-23-49.2L400 384l-25 20.8C360.4 417 352 435 352 454l0 58-64 0zM70.4 5.2c5.7-4.3 13.5-4.3 19.2 0l16 12C139.8 42.9 160 83.2 160 126l0 2L0 128l0-2C0 83.2 20.2 42.9 54.4 17.2l16-12zM0 160l160 0 0 136.6c-19.1 11.1-32 31.7-32 55.4l0 128c0 9.6 2.1 18.6 5.8 26.8c-6.6 3.4-14 5.2-21.8 5.2l-64 0c-26.5 0-48-21.5-48-48L0 176l0-16z" />
                </svg>
            </a>

            <!-- Close Sidebar Button -->
            <button @click="open = false" class="text-gray-500 hover:text-gray-900 dark:hover:text-gray-300 focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                        d="M6 18L18 6M6 6l12 12"></path>
                </svg>
            </button>
        </div>

        <!-- Sidebar Links -->
        <nav class="mt-4">
            <ul class="space-y-2">
                <li>
                    <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')">
                        {{ __('Dashboard') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('hafalan.index')" :active="request()->routeIs('hafalan.index')">
                        {{ __('Hafalan') }}
                    </x-nav-link>
                </li>
                <li>
                    <x-nav-link :href="route('iqra.index')" :active="request()->routeIs('iqra.index')">
                        {{ __('Iqra') }}
                    </x-nav-link>
                </li>
                <!-- Tambahkan link lainnya sesuai kebutuhan -->
            </ul>
        </nav>
    </div>

    <!-- Main Content -->
    <div class="flex-1">
        <header class="bg-white dark:bg-gray-800">
            <button @click="open = true" class="p-2 text-gray-500 dark:text-gray-300">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </header>

        <main class="p-4">
            <!-- Konten utama Anda -->
            <h1 class="text-2xl">Selamat Datang di Dashboard</h1>
        </main>
    </div>
</div>
