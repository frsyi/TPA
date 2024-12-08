<!DOCTYPE html>
<html lang="en">
   <head>
      <!-- basic -->
      <meta charset="utf-8">
      <meta http-equiv="X-UA-Compatible" content="IE=edge">
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <!-- mobile metas -->
      <meta name="viewport" content="width=device-width, initial-scale=1">
      <meta name="viewport" content="initial-scale=1, maximum-scale=1">
      <!-- site metas -->
      <title>TPA Masjid Al-Mubarok</title>
      <meta name="keywords" content="">
      <meta name="description" content="">
      <meta name="author" content="">
      <!-- bootstrap css -->
      <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
      <!-- style css -->
      <link rel="stylesheet" type="text/css" href="assets/css/style.css">
      <!-- Responsive-->
      <link rel="stylesheet" href="assets/css/responsive.css">
      <!-- Scrollbar Custom CSS -->
      <link rel="stylesheet" href="assets/css/jquery.mCustomScrollbar.min.css">
      <!-- Tweaks for older IEs-->
      <link rel="stylesheet" href="https://netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css">
      <!-- owl stylesheets -->
      <link rel="stylesheet" href="assets/css/owl.carousel.min.css">
      <link rel="stylesheet" href="assets/css/owl.theme.default.min.css">
      <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.css" media="screen">
   </head>
   <body>
      <!-- section header start -->
      <div class="header_section">
         <div class="container">
            <div class="row">
               <div class="col-md-3">
                  <div class="logo">
                    <svg xmlns="http://www.w3.org/2000/svg"  height="50" width="50" viewBox="0 0 640 512"><!--!Font Awesome Free 6.6.0 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license/free Copyright 2024 Fonticons, Inc.--><path fill="#88C273" d="M400 0c5 0 9.8 2.4 12.8 6.4c34.7 46.3 78.1 74.9 133.5 111.5c0 0 0 0 0 0s0 0 0 0c5.2 3.4 10.5 7 16 10.6c28.9 19.2 45.7 51.7 45.7 86.1c0 28.6-11.3 54.5-29.8 73.4l-356.4 0c-18.4-19-29.8-44.9-29.8-73.4c0-34.4 16.7-66.9 45.7-86.1c5.4-3.6 10.8-7.1 16-10.6c0 0 0 0 0 0s0 0 0 0C309.1 81.3 352.5 52.7 387.2 6.4c3-4 7.8-6.4 12.8-6.4zM288 512l0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-48 0c-17.7 0-32-14.3-32-32l0-128c0-17.7 14.3-32 32-32l416 0c17.7 0 32 14.3 32 32l0 128c0 17.7-14.3 32-32 32l-48 0 0-72c0-13.3-10.7-24-24-24s-24 10.7-24 24l0 72-64 0 0-58c0-19-8.4-37-23-49.2L400 384l-25 20.8C360.4 417 352 435 352 454l0 58-64 0zM70.4 5.2c5.7-4.3 13.5-4.3 19.2 0l16 12C139.8 42.9 160 83.2 160 126l0 2L0 128l0-2C0 83.2 20.2 42.9 54.4 17.2l16-12zM0 160l160 0 0 136.6c-19.1 11.1-32 31.7-32 55.4l0 128c0 9.6 2.1 18.6 5.8 26.8c-6.6 3.4-14 5.2-21.8 5.2l-64 0c-26.5 0-48-21.5-48-48L0 176l0-16z"/>
                  </svg></div>
               </div>
               <div class="col-md-9">
                  <div class="menu_text">
                        <div class="relative min-h-screen bg-gray-100 bg-center sm:flex sm:justify-center sm:items-center bg-dots-darker dark:bg-dots-lighter dark:bg-gray-900 selection:bg-red-500 selection:text-white">
                            @if (Route::has('login'))
                                <div class="z-10 p-6 text-right sm:fixed sm:top-0 sm:right-0">
                                    @auth
                                        <a href="{{ url('/dashboard') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Dashboard</a>
                                    @else
                                        <a href="{{ route('login') }}" class="font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Log in</a>

                                        @if (Route::has('register'))
                                            <a href="{{ route('register') }}" class="ml-4 font-semibold text-gray-600 hover:text-gray-900 dark:text-gray-400 dark:hover:text-white focus:outline focus:outline-2 focus:rounded-sm focus:outline-red-500">Register</a>
                                        @endif
                                    @endauth
                                </div>
                            @endif
                        </div>
               </div>
            </div>
         </div>
      </div>
      <!-- section header end -->
     {{--   <!-- banner section start -->
      <div class="banner_section">
        <div class="row">
         <div class="container-fluid">
            <div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel">
               <div class="carousel-inner">
                  <div class="carousel-item active">
                     <div class="row">
                        <div class="col-sm-2">
                           <div class="round"><img src="assets/images/round-icon.png"></div>
                           <p class="number_text"></p>
                           <div class="line"><img src="assets/images/line.png"></div>
                           <p class="number_text"></p>
                           <div class="round"><img src="assets/images/round-icon.png"></div>
                        </div>
                        <div class="col-sm-5">
                           <div class="taital_main">
                              <h1 class="about_text">TPA Masjid Al-Mubarok</h1>
                              <p class="long_text">TPA Masjid Al-Mubarok adalah tempat penuh berkah yang menjadi pusat kegiatan ibadah dan pendidikan agama. Di sini, lantunan doa dan suara anak-anak mengaji menyatu dalam harmoni yang menghangatkan hati. Selain digunakan untuk sholat berjamaah, TPA ini menjadi wadah bagi generasi muda untuk belajar Al-Qur'an dan memperdalam ilmu agama. Semoga TPA Masjid Al-Mubarok terus menjadi cahaya kebaikan yang menerangi umat, mencetak generasi yang beriman, dan menebarkan keberkahan bagi masyarakat sekitarnya. </p>
                           </div>
                        </div>
                        <div class="col-sm-5">
                           <div><img src="assets/images/masjid-bg.png"></div>
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <!-- banner section end --> --}}
      <!-- about section start -->
      <div class="about_section">
         <div class="container-fluid">
            <div class="row">
               <div class="col-md-6">
                  <div class="about_taital">
                     <h1 class="about_text">TPA Masjid Al-Mubarok</h1>
                     <p class="long_text">TPA Masjid Al-Mubarok adalah tempat penuh berkah yang menjadi pusat kegiatan ibadah dan pendidikan agama. Di sini, lantunan doa dan suara anak-anak mengaji menyatu dalam harmoni yang menghangatkan hati. Selain digunakan untuk sholat berjamaah, TPA ini menjadi wadah bagi generasi muda untuk belajar Al-Qur'an dan memperdalam ilmu agama. Semoga TPA Masjid Al-Mubarok terus menjadi cahaya kebaikan yang menerangi umat, mencetak generasi yang beriman, dan menebarkan keberkahan bagi masyarakat sekitarnya.</p>

                  </div>
               </div>
               <div class="col-md-6 padding_0">
                  <div class="about_img"><img src="assets/images/masjid.png"></div>
               </div>
            </div>
         </div>
      </div>
      <!-- about section end -->
      <!-- copyright section start -->
      <div class="copyright_section">
         <p class="copyright_text">TPA Masjid Al-Mubarok</p>
      </div>
      <!-- copyright section end -->
      <!-- Javascript files-->
      <script src="assets/js/jquery.min.js"></script>
      <script src="assets/js/popper.min.js"></script>
      <script src="assets/js/bootstrap.bundle.min.js"></script>
      <script src="assets/js/jquery-3.0.0.min.js"></script>
      <script src="assets/js/plugin.js"></script>
      <!-- sidebar -->
      <script src="assets/js/jquery.mCustomScrollbar.concat.min.js"></script>
      <script src="assets/js/custom.js"></script>
      <!-- javascript -->
      <script src="assets/js/owl.carousel.js"></script>
      <script src="https:cdnjs.cloudflare.com/ajax/libs/fancybox/2.1.5/jquery.fancybox.min.js"></script>
      <script>
         $(document).ready(function(){
         $(".fancybox").fancybox({
            openEffect: "none",
            closeEffect: "none"
            });

            $(".zoom").hover(function(){

            $(this).addClass('transition');
            }, function(){

            $(this).removeClass('transition');
            });
            });

      </script>
      <script>
         function openNav() {
         document.getElementById("myNav").style.width = "100%";
         }

         function closeNav() {
         document.getElementById("myNav").style.width = "0%";
         }
      </script>
   </body>
</html>
