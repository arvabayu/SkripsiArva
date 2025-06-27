<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta content="width=device-width, initial-scale=1.0" name="viewport">
  <title>PERPUSGRES</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <!-- Favicons -->
  <link href="assets/img/favicon.png" rel="icon">
  <link href="assets/img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Fonts -->
  <link href="https://fonts.googleapis.com" rel="preconnect">
  <link href="https://fonts.gstatic.com" rel="preconnect" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,100;0,300;0,400;0,500;0,700;0,900;1,100;1,300;1,400;1,500;1,700;1,900&family=Raleway:ital,wght@0,100;0,200;0,300;0,400;0,500;0,600;0,700;0,800;0,900;1,100;1,200;1,300;1,400;1,500;1,600;1,700;1,800;1,900&family=Nunito+Sans:ital,wght@0,200;0,300;0,400;0,600;0,700;0,800;0,900;1,200;1,300;1,400;1,600;1,700;1,800;1,900&display=swap" rel="stylesheet">
  <link href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" rel="stylesheet"  />

  <!-- Vendor CSS Files -->
  <link href="{{asset('assets/vendor/bootstrap/css/bootstrap.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/bootstrap-icons/bootstrap-icons.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/aos/aos.css" rel="stylesheet')}}">
  <link href="{{asset('assets/vendor/swiper/swiper-bundle.min.css')}}" rel="stylesheet">
  <link href="{{asset('assets/vendor/glightbox/css/glightbox.min.css')}}" rel="stylesheet">

  <!-- Main CSS File -->
  <link href="{{asset('assets/css/main.css')}}" rel="stylesheet">

</head>
<body class="index-page">

  <header id="header" class="header d-flex align-items-center fixed-top">
    <div class="header-container container-fluid container-xl position-relative d-flex align-items-center justify-content-between">

      <a href="/" class="logo d-flex align-items-center me-auto me-xl-0">
        <!-- Uncomment the line below if you also wish to use an image logo -->
         <img src="assets/img/Lambang_Kabupaten_Gresik.png" alt="Logo Perpustakaan" class="me-2" style="height: 40px;">
        <!-- <img src="assets/img/logo.webp" alt=""> -->
        <h1 class="sitename">Sistem Informasi Perpustakaan</h1>
      </a>

      <nav id="navmenu" class="navmenu">
        <ul>
          <li><a href="#hero" class="active">Home</a></li>
          <li><a href="{{route('guest.lihat')}}">Koleksi</a></li>
        </ul>
        <i class="mobile-nav-toggle d-xl-none bi bi-list"></i>
      </nav>
       @auth
      <div class="dropdown-center">
        <button class="btn btn-secondary dropdown-toggle" type="button" data-bs-toggle="dropdown" aria-expanded="false">
          {{ auth()->user()->name }}
        </button>
        <ul class="dropdown-menu">
          <li><a class="dropdown-item" href="#">Profil</a></li>
          <li>
            <form action="/logout" method="post">
              @csrf
              <button type="submit" class="dropdown-item">Logout</button>
            </form>
          </li>
        </ul>
      </div>
      @else
      <a href="/login" class="btn btn-warning mx-2">Login <i class="bi bi-box-arrow-in-right"></i></a>
      @endauth

    </div>
  </header>

  <main class="main">

    <!-- Hero Section -->
    <section id="hero" class="hero section">
      
      <div class="container">
        <div class="row ">
          <div class="col-lg-7 content-col" data-aos="zoom-out">
            <div class="content">
              <div class="main-heading">
                
                <h1>
                  DINAS PERPUSTAKAAN <br><strongn>DAN KEARSIPAN</strongn></h1>
              </div>

              <div class="divider"></div>
              <div class="description">
                <p>Temukan buku terkini untuk memperluas wawasan. Jelajahi topik favorit dan buka pintu menuju dunia pengetahuan yang lebih menarik!</p>
              </div>

              <div class="cta-button">
                <a href="{{route('guest.lihat')}}" class="btn">
                  <span>START EXPLORE!</span>
                  <i class="bi bi-arrow-right"></i>
                </a>
              </div>
            </div>
          </div>

          <div class="col-lg-5" data-aos="zoom-out">
            <div class="visual-content">
              <div class="fluid-shape">
                <img src="assets/img/booksss.png" alt="Abstract Fluid Shape" class="fluid-img">
              </div>

              <div class="stats-card">
                <div class="stats-number">
                  <img src="" alt="" class="me-2" style="height: 25px;">
                  <h2>ABOUT</h2>
                </div>
                <div class="stats-label">
                  <p>PERPUSTAKAAN GRESIK</p>
                </div>
                <div class="stats-arrow">
                  <a href="https://disparekrafbudpora.gresikkab.go.id/detailpost/perpustakaan-daerah"target="blank"><i class="bi bi-arrow-up-right"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section><!-- /Hero Section -->

    <!-- Testimonials Section -->
    <section id="testimonials" class="testimonials section dark-background" data-aos="fade-up"data-aos-delay="100">
      <!-- Section Title -->
       <div class="header mb-4" data-aos="fade-up" >
      <div class="container section-title" data-aos="fade-up">
                      <p class="fw-light text-center mb-1">NEWS BOOK</p>
              <h1 class="fw-bold text-center">CHECK OUR NEW BOOK!!</h1>
                              <div class="divider-custom divider-light">
                    <div class="divider-custom-line"></div>
                    <div class="divider-custom-icon"><i class="fas fa-star"></i></div>
                    <div class="divider-custom-line"></div>
                </div>
      </div><!-- End Section Title -->
      <div class="container" data-aos="fade-up" data-aos-delay="100">
        <div class="testimonials-slider swiper init-swiper">
          <script type="application/json" class="swiper-config">
            {
              "slidesPerView": 1,
              "loop": true,
              "speed": 600,
              "autoplay": {
                "delay": 5000
              },
              "navigation": {
                "nextEl": ".swiper-button-next",
                "prevEl": ".swiper-button-prev"
              }
            }
          </script>
      <div class="content-wrapper" data-aos="fade-down" data-aos-anchor-placement="center-bottom">

              <div id="content-fiksi" class="content row row-cols-1 row-cols-sm-2 row-cols-md-3 row-cols-lg-5 justify-content-center">
                @if ($selectedCategory->count() > 0)
                @foreach ($selectedCategory as $book)
                <a href="{{route('guest.lihat')}}" class="col-md-4 mt-4 text-decoration-none">
                  <div class="card">
                    <div class="card-img-block">
               
                      @if($book->cover)
                      <img class="card-img-top" src="/storage/{{ $book->cover }}" alt="Card image cap">
                      @else
                      <img class="card-img-top" src="{{ asset('img/bookCoverDefault.png') }}" alt="Card image cap">
                      @endif
                      </div>
                      <div class="card-body pt-0">
                        <h5 class="card-title">{{ $book->title }}</h5>
                        <p class="card-text">{{ $book->description }}</p>
                      </div>
                    </div>
                </a>
                @endforeach
                
                @else
                <p style="text-align: center; padding: 1rem; color: red">Buku dengan kategori ini sedang kosong</p>
                @endif
              </div>

              <div class="more">
                <a href="{{route('member-books.index')}}" class="text-decoration-none">See more</a>
              </div>
            </div>
            </div>
    </section>

    <!-- Faq Section -->
     
    <section class="faq-9 faq section" id="faq">
     <div class="header mb-4" data-aos="fade-up">
              <p class="fw-light text-center mb-1">INFORMASI</p>
              <h1 class="fw-bold text-center">PANDUAN PEMINJAMAN</h1>
      <div class="clearfix" id="page">
  <!-- <div class="clip_frame grpelem" id="u97">
    <img class="block" id="u97_img" src="https://flexoprint.com.ua/images/way-of-order/1.png" alt="" width="89" height="104">
  </div> -->
  <div class="clearfix grpelem" id="ppu185">
    <div class="clearfix colelem" id="pu185">
      <div class="transition clip_frame grpelem" id="u185">
        <img class="block" id="u185_img" src="assets/img/daftar.png" alt="" width="123" height="142">
      </div>
      <div class="clip_frame grpelem" id="u316">
        <img class="block" id="u316_img" src="assets/img/login2.png" alt="" width="123" height="142">
      </div>
    </div>
    <div class="clearfix colelem" id="pu134">
      <div class="rounded-corners grpelem" id="u134"></div>
      <div class="rounded-corners grpelem" id="u446"></div>
      <div class="rounded-corners grpelem" id="u449">
      </div>
      <div class="rounded-corners grpelem" id="u446"></div>
      <div class="rounded-corners grpelem" id="u146">
      </div>
      <div class="rounded-corners grpelem" id="u401">
      </div>
      <div class="rounded-corners grpelem" id="u173">
      </div>
      <div class="rounded-corners grpelem" id="u404">
      </div>
      <div class="rounded-corners grpelem" id="u549">
      </div>
      <div class="rounded-corners grpelem" id="u543">
      </div>
      <div class="rounded-corners grpelem" id="u298">
      </div>
      <div class="rounded-corners grpelem" id="u407">
      </div>
      <div class="rounded-corners grpelem" id="u552">
      </div>
      <div class="rounded-corners grpelem" id="u307">
      </div>
      <div class="rounded-corners grpelem" id="u395">
      </div>
      <div class="rounded-corners grpelem" id="u338">
      </div>
      <div class="clearfix grpelem" id="u344-4">
        <p1>Daftar dengan data pribadi</p1>
      </div>
      <div class="clearfix grpelem" id="u352-4">
        <p1>Login untuk meminjam buku</p1>
      </div>
      <div class="clearfix grpelem" id="u621-4">
        <p1>Mendapatkan kode peminjaman<span class="bg-dark text-white badge">XX-XXXXXX</span> berjumlah 8 digit</p1>
        
      </div>
      <div class="clearfix grpelem" id="u627-4">
        <p1>Cari dan pilih buku yang dipinjam</p1>
      </div>
      
      
      <div class="clip_frame grpelem" id="u355">
        <img class="block" id="u355_img" src="assets/img/coded.png" alt="" width="123" height="142">
      </div>
      <div class="rounded-corners grpelem" id="u384">
      </div>
      <div class="rounded-corners grpelem" id="u575">
      </div>
      <div class="rounded-corners grpelem" id="u410">
      </div>
      <div class="rounded-corners grpelem" id="u443">
      </div>
      <div class="clip_frame grpelem" id="u433">
        <img class="block" id="u433_img" src="assets/img/search.png" alt="" width="123" height="142">
      </div>
      <div class="clip_frame grpelem" id="u555">
        <img class="block" id="u555_img" src="assets/img/perpustakaan.png" alt="" width="123" height="142">
        <div class="highlight-box"></div> 
      </div>
    </div>
    <div class="clearfix colelem" id="pu630-4">
      <div class="clearfix grpelem" id="u633-4">
        <p1>Datang ke Perpustakaan PERPUSTAKAAN GRESIK lalu berikan kode peminjaman kepada pustakawan</p1>
      </div>
    </div>
  </div>
  <div class="clearfix grpelem" id="pu584">
    <div class="clip_frame grpelem" id="u584">
      <img class="block" id="u584_img" src="assets/img/bgg.png" alt="" width="105" height="110">
    </div>
    <div class="rounded-corners grpelem" id="u581">
    </div>
  </div>
</div>
    </div>
    </section><!-- /Faq Section -->
  </main>

  <footer id="footer" class="footer">
    <div class="container footer-top">
      <div class="row gy-4">
        <div class="col-lg-5 col-md-12 footer-about">
          <a href="index.html" class="logo d-flex align-items-center">
            <span class="sitename">E-PERPUSGRES</span>
          </a>
          <p>Temukan buku terkini untuk memperluas wawasan. Jelajahi topik favorit dan buka pintu menuju dunia pengetahuan yang lebih menarik!</p>
          <div class="social-links d-flex mt-4">
            <a href="https://www.instagram.com/perpussip_gresik/"><i class="bi bi-instagram"target="blank"></i></a>
          </div>
        </div>

        <div class="col-lg-2 col-6 footer-links">
          <h4>Useful Links</h4>
          <ul>
            <li><a href="#">Home</a></li>
            <li><a href="#">Koleksi</a></li>
          </ul>
        </div>

        <div class="col-lg-3 col-md-12 footer-contact text-center text-md-start">
          <h4>HOTLINE</h4>
          <h4>Dinas Perpustakaan dan Kearsipan</h4>
          <p1>Jl. Jaksa Agung Suprapto No.20</p1>
          <p1>Tlogobendung, Bedilan, Kec. Gresik, Kabupaten Gresik</p1>
          <p1>Jawa Timur 61111</p1>
          <p1 class="mt-4"><strong>Phone:</strong> <span>(031) 3974627</span></p1>
          <p1><strong>Email:</strong> <span>disperpusip@gresikkab.go.id</span></p1>
        </div>

      </div>
    </div>
 

  </footer>
   <div class="container copyright text-center mt-4">
      <p1>© <span>Copyright</span> <stronga class="px-1 sitename">Dinas Perpustakaan dan Kearsipan Kota Gresik</stronga> <span></span></p1>
    </div>
  <!-- Scroll Top -->
  <a href="#" id="scroll-top" class="scroll-top d-flex align-items-center justify-content-center"><i class="bi bi-arrow-up-short"></i></a>

  <!-- Preloader -->
  <div id="preloader"></div>

  <!-- Vendor JS Files -->
  <script src="{{asset('assets/vendor/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/php-email-form/validate.js')}}"></script>
  <script src="{{asset('assets/vendor/aos/aos.js')}}"></script>
  <script src="{{asset('assets/vendor/swiper/swiper-bundle.min.js')}}"></script>
  <script src="{{asset('assets/vendor/glightbox/js/glightbox.min.js')}}"></script>
  <script src="{{asset('assets/vendor/imagesloaded/imagesloaded.pkgd.min.js')}}"></script>
  <script src="{{asset('assets/vendor/isotope-layout/isotope.pkgd.min.js')}}"></script>
  

  <!-- Main JS File -->
  <script src="{{asset('assets/js/main.js')}}"></script>

</body>

</html>