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
     <section class="faq-9 faq section" id="faq">

      <div class="container">
        <div class="row">

          <div class="col-lg-5" data-aos="fade-up">
            <h2 class="faq-title">NOTES</h2>
            <p class="faq-description">HAK & KEUNTUNGAN</p>
            <div class="faq-arrow d-none d-lg-block" data-aos="fade-up" data-aos-delay="200">
              <svg class="faq-arrow" width="200" height="211" viewBox="0 0 200 211" fill="none" xmlns="http://www.w3.org/2000/svg">
                <path d="M198.804 194.488C189.279 189.596 179.529 185.52 169.407 182.07L169.384 182.049C169.227 181.994 169.07 181.939 168.912 181.884C166.669 181.139 165.906 184.546 167.669 185.615C174.053 189.473 182.761 191.837 189.146 195.695C156.603 195.912 119.781 196.591 91.266 179.049C62.5221 161.368 48.1094 130.695 56.934 98.891C84.5539 98.7247 112.556 84.0176 129.508 62.667C136.396 53.9724 146.193 35.1448 129.773 30.2717C114.292 25.6624 93.7109 41.8875 83.1971 51.3147C70.1109 63.039 59.63 78.433 54.2039 95.0087C52.1221 94.9842 50.0776 94.8683 48.0703 94.6608C30.1803 92.8027 11.2197 83.6338 5.44902 65.1074C-1.88449 41.5699 14.4994 19.0183 27.9202 1.56641C28.6411 0.625793 27.2862 -0.561638 26.5419 0.358501C13.4588 16.4098 -0.221091 34.5242 0.896608 56.5659C1.8218 74.6941 14.221 87.9401 30.4121 94.2058C37.7076 97.0203 45.3454 98.5003 53.0334 98.8449C47.8679 117.532 49.2961 137.487 60.7729 155.283C87.7615 197.081 139.616 201.147 184.786 201.155L174.332 206.827C172.119 208.033 174.345 211.287 176.537 210.105C182.06 207.125 187.582 204.122 193.084 201.144C193.346 201.147 195.161 199.887 195.423 199.868C197.08 198.548 193.084 201.144 195.528 199.81C196.688 199.192 197.846 198.552 199.006 197.935C200.397 197.167 200.007 195.087 198.804 194.488ZM60.8213 88.0427C67.6894 72.648 78.8538 59.1566 92.1207 49.0388C98.8475 43.9065 106.334 39.2953 114.188 36.1439C117.295 34.8947 120.798 33.6609 124.168 33.635C134.365 33.5511 136.354 42.9911 132.638 51.031C120.47 77.4222 86.8639 93.9837 58.0983 94.9666C58.8971 92.6666 59.783 90.3603 60.8213 88.0427Z" fill="currentColor"></path>
              </svg>
            </div>
          </div>

          <div class="col-lg-7" data-aos="fade-up" data-aos-delay="300">
            <div class="faq-container">

              <div class="faq-item faq-active">
                <h3>MEMBER</h3>
                <div class="faq-content">
                  <p>Menjadi member perpustakaan digital berarti Anda telah terdaftar secara resmi sebagai pengguna aktif yang memiliki akses penuh terhadap layanan perpustakaan. Sebagai member, Anda akan mendapatkan berbagai kemudahan dalam peminjaman, pengembalian, serta akses ke koleksi digital yang luas.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>PEMINJAMAN</h3>
                <div class="faq-content">
                  <p>Sebagai member, Anda memiliki hak untuk meminjam buku secara online. Proses peminjaman bisa dilakukan melalui sistem perpustakaan digital tanpa harus datang langsung ke lokasi.</p>
                  <p style="color: #FFD700;">✔<strong style="color: white;"> Akses peminjaman 24/7</strong></p>
                  <p style="color: #FFD700;">✔<strong style="color: white;"> Bisa memilih buku dari berbagai kategori</strong></p>
                  <p style="color: #FFD700;">✔<strong style="color: white;"> Mendapatkan histori peminjaman</strong></p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>PENGEMBALIAN</h3>
                <div class="faq-content">
                  <p> Pengembalian buku dilakukan secara konvensional, yaitu dengan datang langsung ke perpustakaan.Setiap member wajib mengembalikan buku fisik yang dipinjam sebelum atau pada tanggal jatuh tempo.Proses pengembalian dilakukan melalui petugas yang ada di lokasi.</p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->

              <div class="faq-item">
                <h3>PELANGGARAN</h3>
                <div class="faq-content">
                  <p>Member wajib mengikuti aturan peminjaman. Jika terjadi pelanggaran seperti keterlambatan pengembalian atau penyalahgunaan akun, maka akan ada sanksi.
                  </p>
                  <p>Sanksi:</p>
                  <strong>Jenis pelanggaran :</strong>
                   <p style="color: #FFD700;">✔<strong style="color: white;"> 3 X Terlambat mengembalikan</strong></p>
                  <p style="color: #FFD700;">✔<strong style="color: white;"> Merusak buku pinjaman</strong></p>
                  <strong>Sanksi :</strong>
                  <p style="color: #FFD700;">✔<strong style="color: white;"> Penangguhan hak akses peminjaman</strong></p>
                </div>
                <i class="faq-toggle bi bi-chevron-right"></i>
              </div><!-- End Faq item-->
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