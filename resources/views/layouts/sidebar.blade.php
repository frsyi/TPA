<div :class="{'translate-x-0': sidebarOpen, '-translate-x-full': !sidebarOpen}" class="fixed inset-y-0 z-30 flex-shrink-0 w-64 transition-transform duration-200 ease-in-out transform bg-white border-r dark:bg-gray-900 dark:border-gray-700 lg:translate-x-0">
    <nav class="flex flex-col h-full px-4 py-6 space-y-4 bg-light-background">
        <!-- Logo -->
        <div class="flex items-center justify-center h-16 bg-light-background dark:bg-gray-900">
            <a href="{{ route('dashboard') }}" class="text-lg font-bold text-white">
                <x-application-logo class="w-20 h-20 text-gray-500 fill-current" />
            </a>
        </div>

        <!-- Navigation -->
        <!-- Navigation -->
        @canany(['admin', 'orangtua'])
            <x-nav-link :href="route('hafalan.index')" :active="request()->routeIs('hafalan.index')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c.28 0 .56.04.82.11m-.82 3.39c-3.31 0-6 2.69-6 6v1h12v-1c0-3.31-2.69-6-6-6zm0-4a4 4 0 110 8 4 4 0 010-8z" />
                    </svg>
                    {{ __('Hafalan') }}
                </div>
            </x-nav-link>
            <x-nav-link :href="route('iqra.index')" :active="request()->routeIs('iqra.index')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c.28 0 .56.04.82.11m-.82 3.39c-3.31 0-6 2.69-6 6v1h12v-1c0-3.31-2.69-6-6-6zm0-4a4 4 0 110 8 4 4 0 010-8z" />
                    </svg>
                    {{ __('Iqra') }}
                </div>
            </x-nav-link>
        @endcanany

        @can('admin')
            <x-nav-link :href="route('siswa.index')" :active="request()->routeIs('siswa.*')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7" />
                    </svg>
                    {{ __('Siswa') }}
                </div>
            </x-nav-link>
            <x-nav-link :href="route('orangtua.index')" :active="request()->routeIs('orangtua.index')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 4a1 1 0 011-1h6a1 1 0 011 1v1h6a1 1 0 011 1v3a1 1 0 01-1 1h-1v5a1 1 0 01-1 1h-5a1 1 0 01-1-1v-5H4a1 1 0 01-1-1V5a1 1 0 011-1z" />
                    </svg>
                    {{ __('Orangtua') }}
                </div>
            </x-nav-link>
        @endcan

        @can('pengurus')
            <x-nav-link :href="route('pengajar.index')" :active="request()->routeIs('pengajar.*')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 16l-4-4m0 0l4-4m-4 4h12" />
                    </svg>
                    {{ __('Pengajar') }}
                </div>
            </x-nav-link>
            <x-nav-link :href="route('activity-logs.index')" :active="request()->routeIs('activity-logs.index')">
                <div class="flex items-center">
                    <svg xmlns="http://www.w3.org/2000/svg" class="w-5 h-5 mr-2" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                        <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 12h6m-6 4h6m-6-8h6" />
                    </svg>
                    {{ __('Aktivitas Pengajar') }}
                </div>
            </x-nav-link>
        @endcan
    </nav>
</div>

<!-- Overlay for Mobile -->
<div x-show="sidebarOpen"
     @click="sidebarOpen = false"
     class="fixed inset-0 z-20 bg-black bg-opacity-50 lg:hidden">
</div>





{{-- <!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Responsive Sidebar</title>
  <script src="https://cdn.jsdelivr.net/npm/tw-elements"></script>
  <script src="https://cdn.tailwindcss.com"></script>
  <style>
    /* Tambahan agar scrollbar rapi */
    .scrollbar-custom::-webkit-scrollbar {
      width: 4px;
    }
    .scrollbar-custom::-webkit-scrollbar-track {
      background: #f1f1f1;
    }
    .scrollbar-custom::-webkit-scrollbar-thumb {
      background: #888;
    }
    .scrollbar-custom::-webkit-scrollbar-thumb:hover {
      background: #555;
    }
  </style>
</head>
<body class="bg-gray-100">

  <!-- Navbar -->
  <div class="fixed top-0 left-0 z-50 w-full bg-white shadow-md dark:bg-gray-800">
    <div class="flex items-center justify-between p-4">
      <!-- Hamburger Button -->
      <button id="sidebarToggle" class="text-gray-700 dark:text-white lg:hidden focus:outline-none focus:ring-2 focus:ring-gray-300">
        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
          <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16m-7 6h7"></path>
        </svg>
      </button>
      <a href="#" class="text-xl font-bold text-gray-800 dark:text-white">Brand</a>
    </div>
  </div>
  <!-- End Navbar -->

  <!-- Sidebar -->
    <div id="sidebar" class="fixed top-0 left-0 z-40 w-64 h-full overflow-y-auto transition-transform duration-300 -translate-x-full bg-white border-r border-gray-200 dark:bg-gray-800 dark:border-gray-700 lg:translate-x-0 lg:block scrollbar-custom">
        <div class="p-6">
            <a href="#" class="block mb-6 text-xl font-bold text-gray-800 dark:text-white">Brand</a>
            <nav>
                <ul class="space-y-2">
                    <!-- Dashboard -->
                    <li>
                        <a href="{{ route('dashboard') }}" class="flex items-center gap-3 p-2 text-gray-800 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="m3 9 9-7 9 7v11a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2z"/><polyline points="9 22 9 12 15 12 15 22"/></svg>
                        Dashboard
                        </a>
                    </li>
                    <!-- Hafalan -->
                    <li>
                        <a href="{{ route('hafalan.index') }}" class="flex items-center gap-3 p-2 text-gray-800 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="m21.7 16.4-.9-.3"/><path d="m15.2 13.9-.9-.3"/></svg>
                        Hafalan
                        </a>
                    </li>
                    <!-- Iqra -->
                    <li>
                        <a href="{{ route('iqra.index') }}" class="flex items-center gap-3 p-2 text-gray-800 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><circle cx="18" cy="15" r="3"/><circle cx="9" cy="7" r="4"/><path d="M10 15H6a4 4 0 0 0-4 4v2"/><path d="m21.7 16.4-.9-.3"/><path d="m15.2 13.9-.9-.3"/></svg>
                        Iqra
                        </a>
                    </li>
                    <!-- Siswa -->
                    <li>
                        <a href="{{ route('siswa.index') }}" class="flex items-center gap-3 p-2 text-gray-800 rounded-lg hover:bg-gray-100 dark:text-white dark:hover:bg-gray-700">
                        <svg class="w-6 h-6" xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M15.5 2H8.6c-.4 0-.8.2-1.1.5-.3.3-.5.7-.5 1.1v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8c.4 0 .8-.2 1.1-.5.3-.3.5-.7.5-1.1V6.5L15.5 2z"/><path d="M3 7.6v12.8c0 .4.2.8.5 1.1.3.3.7.5 1.1.5h9.8"/></svg>
                        Siswa
                        </a>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
  <!-- End Sidebar -->

  <!-- Overlay -->
  <div id="overlay" class="fixed inset-0 z-30 hidden bg-black bg-opacity-50"></div>

  <script>
    const sidebar = document.getElementById('sidebar');
    const overlay = document.getElementById('overlay');
    const toggleButton = document.getElementById('sidebarToggle');

    toggleButton.addEventListener('click', () => {
      sidebar.classList.toggle('-translate-x-full');
      overlay.classList.toggle('hidden');
    });

    overlay.addEventListener('click', () => {
      sidebar.classList.add('-translate-x-full');
      overlay.classList.add('hidden');
    });
  </script>

</body>
</html> --}}
