<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>TPA Masjid Al-Mubarok</title>
    <meta name="keywords" content="TPA, Masjid, Pendidikan Agama">
    <meta name="description" content="TPA Masjid Al-Mubarok sebagai pusat pendidikan agama dan ibadah.">
    <meta name="author" content="TPA Masjid Al-Mubarok">

    <!-- Tailwind CSS -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="font-sans text-gray-800 bg-white dark:bg-gray-900 dark:text-white">
    <!-- Header Section -->
    <header class="bg-gradient-to-r from-[#00738a] to-[#005f70] p-5 flex justify-between items-center px-12">
        <div class="logo">
            <svg xmlns="http://www.w3.org/2000/svg" height="50" width="50" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#88C273" d="M400 0c5 0 9.8 2.4 12.8 6.4c34.7 46.3 78.1 74.9 133.5 111.5c0 0 0 0 0 0s0 0 0 0c5.2 3.4 10.5 7 16 10.6c28.9 19.2 45.7 51.7 45.7 86.1c0 28.6-11.3 54.5-29.8 73.4l-356.4 0c-18.4-19-29.8-44.9-29.8-73.4c0-34.4 16.7-66.9 45.7-86.1c5.4-3.6 10.8-7.1 16-10.6c0 0 0 0 0 0s0 0 0 0C309.1 81.3 352.5 52.7 387.2 6.4c3-4 7.8-6.4 12.8-6.4zM288 512l0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-48 0c-17.7 0-32-14.3-32-32l0-128c0-17.7 14.3-32 32-32l416 0c17.7 0 32 14.3 32 32l0 128c0 17.7-14.3 32-32 32l-48 0 0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-64 0 0-58c0-19-8.4-37-23-49.2L400 384l-25 20.8C360.4 417 352 435 352 454l0 58-64 0zM70.4 5.2c5.7-4.3 13.5-4.3 19.2 0l16 12C139.8 42.9 160 83.2 160 126l0 2L0 128l0-2C0 83.2 20.2 42.9 54.4 17.2l16-12zM0 160l160 0 0 136.6c-19.1 11.1-32 31.7-32 55.4l0 128c0 9.6 2.1 18.6 5.8 26.8c-6.6 3.4-14 5.2-21.8 5.2l-64 0c-26.5 0-48-21.5-48-48L0 176l0-16z"/>
            </svg>
        </div>
        <div class="px-4">
            @if (Route::has('login'))
                @auth
                    <a href="{{ url('/dashboard') }}" class="text-white">Dashboard</a>
                @else
                    <a href="{{ route('login') }}" class="text-white">Log in</a>
                @endauth
            @endif
        </div>
    </header>

    <!-- About Section -->
    <section class="py-16 bg-gray-100 dark:bg-gray-800">
        <div class="container flex flex-col items-center justify-between px-12 mx-auto md:flex-row">
            <div class="text-center md:w-1/2 md:text-left">
                <h1 class="text-4xl font-bold text-[#00738a] mb-4 dark:text-[#88C273]">TPA Masjid Al-Mubarok</h1>
                <p class="mb-6 text-lg leading-relaxed text-gray-700 dark:text-gray-300">
                    TPA Masjid Al-Mubarok adalah tempat penuh berkah yang menjadi pusat kegiatan ibadah dan pendidikan agama. Di sini, lantunan doa dan suara anak-anak mengaji menyatu dalam harmoni yang menghangatkan hati. Selain digunakan untuk sholat berjamaah, TPA ini menjadi wadah bagi generasi muda untuk belajar Al-Qur'an dan memperdalam ilmu agama. Semoga TPA Masjid Al-Mubarok terus menjadi cahaya kebaikan yang menerangi umat, mencetak generasi yang beriman, dan menebarkan keberkahan bagi masyarakat sekitarnya.
                </p>
            </div>
            <div class="flex justify-center md:w-1/2">
                <img src="assets/images/masjid.png" alt="Masjid" class="max-w-full rounded-lg shadow-lg">
            </div>
        </div>
    </section>

    <!-- Footer Section -->
    <footer class="py-4 text-center text-white bg-gray-800 dark:bg-gray-700">
        <p>&copy; 2024 TPA Masjid Al-Mubarok. All Rights Reserved.</p>
    </footer>
</body>
</html>
