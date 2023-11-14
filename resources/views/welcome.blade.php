<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta name="description" content="An impressive and flawless site template that includes various UI elements and countless features, attractive ready-made blocks and rich pages, basically everything you need to create a unique and professional website.">
  <meta name="keywords" content="bootstrap 5, business, corporate, creative, gulp, marketing, minimal, modern, multipurpose, one page, responsive, saas, sass, seo, startup, html5 template, site template">
  <meta name="author" content="elemis">
  <title>Landing Page - Website Pengaduan</title>
  <link rel="shortcut icon" href="{{ asset('/assets') }}/img/favicon.png">
  <link rel="stylesheet" href="{{ asset('/assets') }}/css/plugins.css">
  <link rel="stylesheet" href="{{ asset('/assets') }}/css/style.css">
  <link rel="stylesheet" href="{{ asset('/assets') }}/css/colors/purple.css">
  <link rel="preload" href="{{ asset('/assets') }}/css/fonts/urbanist.css" as="style" onload="this.rel='stylesheet'">
  <style>
    section {
       transition: opacity 0.8s ease-in-out, transform 0.8s ease-in-out;
    }
 
    section.active {
       transform: translateY(0);
    }
 </style>
 
 
</head>

<body>
  <div class="page-frame bg-pale-primary">
    <div class="content-wrapper">
      <header class="wrapper">
        <nav class="navbar navbar-expand-lg classic transparent position-absolute navbar-dark">
          <div class="container flex-lg-row flex-nowrap align-items-center">
            <div class="navbar-brand w-100">
              <a href="/">
                <img class="logo-dark" src="{{ asset('/assets') }}/img/logo-dark.png" alt="" />
                <img class="logo-light" src="{{ asset('/assets') }}/img/logo-light.png" alt="" />
              </a>
            </div>
            <div class="navbar-collapse offcanvas offcanvas-nav offcanvas-start">
              <div class="offcanvas-header d-lg-none">
                <h3 class="text-white fs-30 mb-0">SMK OPKI</h3>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="offcanvas" aria-label="Close"></button>
              </div>
              <div class="offcanvas-body ms-lg-auto d-flex flex-column h-100">
                <ul class="navbar-nav">
                  <li class="nav-item dropdown dropdown-mega"><a class="nav-link" href="#beranda">Beranda</a></li>
                  <li class="nav-item dropdown dropdown-mega"><a class="nav-link" href="#pengaduan">Pengaduan</a></li>
                  <li class="nav-item dropdown dropdown-mega"><a class="nav-link" href="#alurpengaduan">Alur Pengaduan</a></li>
                  <li class="nav-item dropdown dropdown-mega"><a class="nav-link" href="#kontak">Kontak</a></li>
                </ul>
                <!-- /.navbar-nav -->
              </div>
              <!-- /.offcanvas-body -->
            </div>
            <!-- /.navbar-collapse -->
            <div class="navbar-other w-100 d-flex ms-auto">
              <ul class="navbar-nav flex-row align-items-center ms-auto">
                <li class="nav-item"><a class="nav-link" href="/login">Login</a></li>
                <li class="nav-item d-lg-none">
                  <button class="hamburger offcanvas-nav-btn"><span></span></button>
                </li>
              </ul>
              <!-- /.navbar-nav -->
            </div>
            <!-- /.navbar-other -->
          </div>
          <!-- /.container -->
        </nav>
        <!-- /.navbar -->
      </header>
      <!-- /header -->
      <section class="video-wrapper bg-overlay bg-overlay-gradient px-0 mt-0 min-vh-80" id="beranda">
        <video poster="{{ asset('/assets') }}/img/okky/bg.png" src="{{ asset('/assets') }}/img/okky/bg.png" autoplay loop playsinline muted style="opacity: 70%;"></video>
        <div class="video-content">
          <div class="container text-center">
            <div class="row">
              <div class="col-lg-8 col-xl-6 text-center text-white mx-auto">
                <h1 class="display-1 fs-54 text-white mb-5"><span class="rotator-zoom">Pencurian, Kekerasan, Penggunaan Narkoba, Pelanggaran Disiplin, Pelecehan, Pelanggaran Hak Asasi, Sabotase, Pelanggaran Kesehatan dan Keselamatan Kerja, Penyalahgunaan Kekuasaan</span></h1>
                <p class="lead fs-20 mb-0 mx-xxl-8">Segera Laporkan, Ciptakan Keamanan Bersama! <br> Melapor Adalah Langkah Pertama Menuju Lingkungan Aman dan Terlindungi.</p>
              </div>
              <!-- /column -->
            </div>
          </div>
          <!-- /.video-content -->
        </div>
        <!-- /.content-overlay -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light" id="pengaduan">
        <div class="container py-10 py-md-10">
          <div class="row text-center mb-10">
            <div class="col-md-10 col-lg-9 col-xxl-8 mx-auto">
              <h2 class="fs-16 text-uppercase text-muted mb-3">Apa yang bisa diadukan ?</h2>
              <h3 class="display-5 px-xl-10 mb-0">Semua yang terjadi di SMK OPKI Jawa Timur</h3>
            </div>
            <!-- /column -->
          </div>
          <!-- Slider -->
          <div class="container-fluid px-md-6">
            <div class="swiper-container blog grid-view mb-17 mb-md-19" data-margin="30" data-nav="true" data-dots="true" data-items-xxl="3" data-items-md="2" data-items-xs="1">
              <div class="swiper">
                <div class="swiper-wrapper">
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/pencurian.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/kekerasan.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/Penyalahgunaan Narkoba.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/Pelanggaran.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/Pelecehan.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/Sabotase.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                  <div class="swiper-slide">
                    <figure class="rounded"><img src="{{ asset('/assets') }}/img/okky/lainnya.png" alt="" /></figure>
                  </div>
                  <!--/.swiper-slide -->
                </div>
                <!--/.swiper-wrapper -->
              </div>
              <!-- /.swiper -->
            </div>
            <!-- /.swiper-container -->
          </div>
          <!-- Alur Pengaduan -->
          <div class="container py-1 py-md-5" id="alurpengaduan">
            <div class="row d-flex align-items-start gy-10 mb-18 mb-md-20">
              <div class="col-lg-5 position-lg-sticky" style="top: 8rem;">
                <h3 class="display-2 mb-5">Alur Pengaduan</h3>
                <p class="mb-7">Berikut tahapan tahapan yang harus dilakukan</p>
              </div>
              <!-- /column -->
              <div class="col-lg-6 ms-auto">
                <div class="card bg-soft-fuchsia mb-6">
                  <div class="card-body d-flex flex-row">
                    <div>
                      <img src="{{ asset('/assets') }}/img/icons/lineal/user.svg" class="svg-inject icon-svg icon-svg-md text-fuchsia me-5" alt="" />
                    </div>
                    <div>
                      <h3 class="fs-21 mb-2">Membuat Akun</h3>
                      <p class="mb-0">Tahap pertama yaitu anda diharuskan memiliki akun untuk melakukan pengaduan.</p>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card bg-soft-aqua mb-6">
                  <div class="card-body d-flex flex-row">
                    <div>
                      <img src="{{ asset('/assets') }}/img/icons/lineal/login.svg" class="svg-inject icon-svg icon-svg-md text-aqua me-5" alt="" />
                    </div>
                    <div>
                      <h3 class="fs-21 mb-2">Login</h3>
                      <p class="mb-0">Jika sudah memiliki akun anda dapat melakukan login.</p>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card bg-soft-yellow mb-6">
                  <div class="card-body d-flex flex-row">
                    <div>
                      <img src="{{ asset('/assets') }}/img/icons/lineal/smartphone.svg" class="svg-inject icon-svg icon-svg-md text-yellow me-5" alt="" />
                    </div>
                    <div>
                      <h3 class="fs-21 mb-2">Membuat Pengaduan</h3>
                      <p class="mb-0">Kemudian anda dapat langsung membuat pengaduan dengan mengisi form yang sudah ada.</p>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
                <div class="card bg-soft-leaf mb-6">
                  <div class="card-body d-flex flex-row">
                    <div>
                      <img src="{{ asset('/assets') }}/img/icons/lineal/refresh.svg" class="svg-inject icon-svg icon-svg-md text-leaf me-5" alt="" />
                    </div>
                    <div>
                      <h3 class="fs-21 mb-2">Pengaduan Diproses</h3>
                      <p class="mb-0">Setelah membuat pengaduan, maka tinggal menunggu admin untuk memproses pengaduan anda.</p>
                    </div>
                  </div>
                  <!-- /.card-body -->
                </div>
                <!-- /.card -->
              </div>
              <!-- /column -->
            </div>
            <!-- /.row -->
          </div>
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light">
        <!-- /.container -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light" id="kontak">
        <div class="container py-15 py-md-17">
          <div class="row gx-lg-8 gx-xl-12 gy-10 gy-lg-0">
            <div class="row text-center mb-10">
              <div class="col-md-10 col-lg-9 col-xxl-8 mx-auto">
                <h3 class="display-5 px-xl-10 mb-0">Kontak Kami</h3>
              </div>
              <!-- /column -->
            </div>
              <div class="row gx-0">
                <div class="col-lg-6 align-self-stretch">
                  <div class="map map-full rounded-top rounded-lg-start">
                    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d8433.172184015291!2d112.70690310043642!3d-7.449520384904409!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x2dd7e17078a4a3d9%3A0x55c96f8adbde084c!2sGelora%20Delta%20Sidoarjo!5e0!3m2!1sen!2sid!4v1699977563080!5m2!1sen!2sid" style="width:100%; height: 100%; border:0" allowfullscreen></iframe>
                  </div>
                  <!-- /.map -->
                </div>
                <!--/column -->
                <div class="col-lg-6">
                  <div class="p-10 p-md-11 p-lg-14">
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-location-pin-alt"></i> </div>
                      </div>
                      <div class="align-self-start justify-content-start">
                        <h5 class="mb-1">Address</h5>
                        <address>Jalan Kenangan No. 17 <br class="d-none d-md-block" />Sidoarjo, Indonesia</address>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-phone-volume"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">Phone</h5>
                        <p>+62 81235678910 </p>
                      </div>
                    </div>
                    <!--/div -->
                    <div class="d-flex flex-row">
                      <div>
                        <div class="icon text-primary fs-28 me-4 mt-n1"> <i class="uil uil-envelope"></i> </div>
                      </div>
                      <div>
                        <h5 class="mb-1">E-mail</h5>
                        <p class="mb-0"><a href="mailto:sandbox@email.com" class="link-body">admin@pengaduan.xyz</a></p>
                      </div>
                    </div>
                    <!--/div -->
                  </div>
                  <!--/div -->
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
          </div>
          <!-- /.row -->
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
      <section class="wrapper bg-light">
        <div class="container pt-15 pt-md-17">
          <div class="row text-center mb-7">
            <div class="col-lg-11 col-xl-10 col-xxl-9 mx-auto">
              <h3 class="display-3 px-lg-12 px-xxl-14">Mari Bergabung</h3>
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
          <div class="row mb-6">
            <div class="col-md-10 col-lg-9 col-xl-7 mx-auto">
              <div class="row align-items-center counter-wrapper gy-4 gy-md-0">
                <div class="col-md-6 text-center">
                  <h3 class="counter counter-lg text-primary">{{ count($pengaduan) }}</h3>
                  <p>Total Pengaduan</p>
                </div>
                <!--/column -->
                <div class="col-md-6 text-center">
                  <h3 class="counter counter-lg text-primary">{{ count($user) }}</h3>
                  <p>Total User</p>
                </div>
                <!--/column -->
              </div>
              <!--/.row -->
            </div>
            <!-- /column -->
          </div>
          <!-- /.row -->
          <figure><img src="{{ asset('/assets') }}/img/okky/image.png" alt="" /></figure>
        </div>
        <!-- /.container -->
      </section>
      <!-- /section -->
    </div>
    <!-- /.content-wrapper -->
    <footer>
      <div class="container py-3">
        <div class="d-md-flex align-items-center justify-content-between">
          <p class="mb-2 mb-lg-0">© 2023 Sandbox. All rights reserved.</p>
          <nav class="nav social social-muted mb-0 text-md-end">
            
          </nav>
          <!-- /.social -->
        </div>
      </div>
      <!-- /.container -->
    </footer>
  </div>
  <!-- /.page-frame -->
  <div class="progress-wrap">
    <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
      <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
    </svg>
  </div>
  <script src="{{ asset('/assets') }}/js/plugins.js"></script>
  <script src="{{ asset('/assets') }}/js/theme.js"></script>
  <script>
    document.addEventListener("DOMContentLoaded", function() {
       // Tambahkan event listener untuk setiap elemen <a> dengan href yang dimulai dengan #
       document.querySelectorAll('a[href^="#"]').forEach(anchor => {
          anchor.addEventListener('click', function (e) {
             e.preventDefault();
 
             const targetId = this.getAttribute('href').substring(1);
             const targetElement = document.getElementById(targetId);
 
             if (targetElement) {
                window.scrollTo({
                   top: targetElement.offsetTop,
                   behavior: 'smooth'
                });
             }
          });
       });
    });
 </script>
 
</body>

</html>