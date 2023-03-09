<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>ReyBidz - Aplikasi perlelangan online</title>
    <meta content="width=device-width, initial-scale=1.0" name="viewport">
    <meta content="Free HTML Templates" name="keywords">
    <meta content="Free HTML Templates" name="description">

    <link rel="icon" type="images/png" href="{{ asset('adminlte/dist/img/lelangonline.png')}}" />
    <!-- Favicon -->
    <link href="{{ asset('startup/img/favicon.ico')}}" rel="icon">
     <!-- Latest compiled and minified CSS -->
  <link rel="stylesheet" href="{{ asset('adminlte/dist/css/bootstrap.min.css')}}">
    <!-- Google Web Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700;800&family=Rubik:wght@400;500;600;700&display=swap" rel="stylesheet">

    <!-- Icon Font Stylesheet -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">

    <!-- Libraries Stylesheet -->
    <link href="{{ asset('startup/lib/owlcarousel/assets/owl.carousel.min.css')}}" rel="stylesheet">
    <link href="{{ asset('startup/lib/animate/animate.min.css')}}" rel="stylesheet">

    <!-- Customized Bootstrap Stylesheet -->
    <link href="{{ asset('startup/css/bootstrap.min.css')}}" rel="stylesheet">

    <!-- Template Stylesheet -->
    <link href="{{ asset('startup/css/style.css')}}" rel="stylesheet">
</head>

<body>
    <!-- Spinner Start -->
    <div id="spinner" class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>
    <!-- Spinner End -->

    <!-- Navbar & Carousel Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fas fa-gavel me-2"></i>ReyBidz</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav ms-auto py-0">
                    <a href="#header-carousel" class="nav-item nav-link active">Home</a>
                </div>
                @auth
                @if(auth()->user()->level == 'admin')
                
                <div class="navbar-nav py-0">
                    <a href="/dashboard/admin" class="nav-item nav-link">Dashboard</a>
                </div>
                @elseif(auth()->user()->level == 'petugas')
                <div class="navbar-nav py-0">
                    <a href="/dashboard/petugas" class="nav-item nav-link">Dashboard</a>
                </div>
                @elseif(auth()->user()->level == 'masyarakat')
                <div class="navbar-nav py-0">
                    <a href="#about" class="nav-item nav-link">About</a>
                </div>
                <div class="navbar-nav py-0">
                    <a href="#listbarang" class="nav-item nav-link">Barang</a>
                </div>
                <div class="navbar-nav py-0">
                    <a href="/dashboard/masyarakat" class="nav-item nav-link">Dashboard</a>
                </div>
                @else

                @endif
                @endauth
                <button type="button" class="btn text-primary ms-3" data-bs-toggle="modal" data-bs-target="#searchModal"><i class="fa fa-search"></i></button>
                @if (Route::has('login'))
                <div class="hidden fixed top-0 right-0 px-6 py-4 sm:block">
                    @auth
                    @if(auth()->user()->level == 'admin')
                <div class="nav-item dropdown">
                    <a href="{{ url('/dashboard/admin') }}" class="nav-link dropdown-toggle btn btn-primary py-1 px-2 ms-3 rounded-5 border border-white" data-bs-toggle="dropdown">
                        <img src="{{asset('adminlte/dist/img/user-gear.png')}}" class="rounded-circle shadow-4-strong" style="width:50px;">
                        {{ Auth::user()->username}} 
                    </a>
                    <div class="dropdown-menu m-0">
                        <a href="{{ route('logout.dashboard')}}" class="dropdown-item">LOGOUT</a>
                    </div>
                </div>
                        @elseif(auth()->user()->level == 'petugas')
                    <div class="nav-item dropdown">
                        <a href="{{ url('/dashboard/petugas') }}" class="nav-link dropdown-toggle btn btn-primary py-1 px-2 ms-3 rounded-5 border border-white" data-bs-toggle="dropdown">
                            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="rounded-circle shadow-4-strong" style="width:50px;">
                            {{ Auth::user()->username}}
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('logout.dashboard')}}" class="dropdown-item">LOGOUT</a>
                        </div>
                    </div>
                        @elseif(auth()->user()->level == 'masyarakat')
                    <div class="nav-item dropdown">
                        <a href="{{ url('/dashboard/masyarakat') }}" class="nav-link dropdown-toggle btn btn-primary py-1 px-2 ms-3 rounded-5 border border-white" data-bs-toggle="dropdown">
                            <img src="{{asset('adminlte/dist/img/user2-160x160.jpg')}}" class="rounded-circle shadow-4-strong" style="width:50px;">
                            {{ Auth::user()->username}}
                        </a>
                        <div class="dropdown-menu m-0">
                            <a href="{{ route('logout.dashboard')}}" class="dropdown-item">LOGOUT</a>
                        </div>
                    </div>
                        @endif
                        @else
                            <a href="{{ route('login') }}" class="btn btn-primary py-2 px-4 ms-3">Log in</a>

                        @if (Route::has('register'))
                            <a href="{{ route('register') }}" class="ml-4 text-sm text-gray-700 dark:text-gray-500 underline">Register</a>
                        @endif
                    @endauth
                </div>
            @endif
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" style="max-height:610px;" src="{{ asset('startup/img/city.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            @if (Route::has('login'))
                            @auth
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">{{Auth::user()->name}}</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Selamat Datang di ReyBidz</h1>
                            @else
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">ReyBidz</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Selamat Datang di ReyBidz</h1>
                            @endauth
                            @endif
                            <a href="{{route('login')}}" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Mulai Lelang Sekarang</a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" style="max-height:610px;" src="{{ asset('startup/img/beach.jpg')}}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">ReyBidz</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Platform Lelang Online Terpercaya</h1>
                           
                            <a href="#" class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Contact Us</a>
                        </div>
                    </div>
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </button>
            <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </button>
        </div>
    </div>
    <!-- Navbar & Carousel End -->


    <!-- Full Screen Search Start -->
    <div class="modal fade" id="searchModal" tabindex="-1">
        <div class="modal-dialog modal-fullscreen">
            <div class="modal-content" style="background: rgba(9, 30, 62, .7);">
                <div class="modal-header border-0">
                    <button type="button" class="btn bg-white btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body d-flex align-items-center justify-content-center">
                    <div class="input-group" style="max-width: 600px;">
                        <input type="text" class="form-control bg-transparent border-primary p-3" placeholder="Type search keyword">
                        <button class="btn btn-primary px-4"><i class="bi bi-search"></i></button>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Full Screen Search End -->

    <!-- Facts Start -->
    @if(Route::has('login'))
    @auth
    
    @else
    <div class="container-fluid facts py-5 pt-lg-0">
        <div class="container py-5 pt-lg-0">
            <div class="row gx-0">
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.1s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-box text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Jumlah Barang</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{ $barangs->count()}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.3s">
                    <div class="bg-light shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-primary d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-tags text-white"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-primary mb-0">Jumlah Lelang</h5>
                            <h1 class="mb-0" data-toggle="counter-up">{{ $lelangs->count()}}</h1>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 wow zoomIn" data-wow-delay="0.6s">
                    <div class="bg-primary shadow d-flex align-items-center justify-content-center p-4" style="height: 150px;">
                        <div class="bg-white d-flex align-items-center justify-content-center rounded mb-2" style="width: 60px; height: 60px;">
                            <i class="fa fa-users text-primary"></i>
                        </div>
                        <div class="ps-4">
                            <h5 class="text-white mb-0">Jumlah Penawaran</h5>
                            <h1 class="text-white mb-0" data-toggle="counter-up">{{ $historylelangs->count()}}</h1>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    @endauth
    @endif
    <!-- Facts Start -->


    <!-- Facts Start -->
    
    <!-- Facts Start -->


    <!-- About Start -->
    <div id="about"class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="row g-5">
                <div class="col-lg-7">
                    <div class="section-title position-relative pb-3 mb-5">
                        <h5 class="fw-bold text-primary text-uppercase">About Us</h5>
                        <h1 class="mb-0">ReyBidz aplikasi lelang untuk mempermudah perlelangan</h1>
                    </div>
                    <p>Selamat datang di ReyBidz - platform lelang online yang memungkinkan Anda untuk membeli dan menjual barang secara mudah dan aman. Kami menyediakan berbagai kategori produk yang berkualitas dan bergaransi, dari elektronik hingga fashion, otomotif, dan banyak lagi.</p>

                        <p>Kami berkomitmen untuk memberikan pengalaman lelang yang transparan, efisien, dan menguntungkan bagi semua pengguna kami. Dengan fitur-fitur canggih seperti sistem penawaran otomatis dan notifikasi real-time, Anda dapat dengan mudah memantau lelang yang sedang berlangsung dan memenangkan barang yang Anda inginkan.</p>
                        
                        <p>Kami juga memiliki tim dukungan pelanggan yang siap membantu Anda setiap saat, menjawab pertanyaan dan memberikan solusi untuk masalah apa pun yang Anda hadapi. Kami percaya bahwa kepuasan pelanggan adalah kunci kesuksesan kami, dan itulah mengapa kami selalu berusaha untuk memberikan pelayanan terbaik kepada setiap pengguna kami.</p>
                        
                        <p class="mb-4">Bergabunglah dengan ReyBidz hari ini dan temukan pengalaman lelang online yang tidak akan Anda temukan di tempat lain!</p>
                    <div class="row g-0 mb-3">
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.2s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>User Friendly</h5>
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Mudah Digunakan</h5>
                        </div>
                        <div class="col-sm-6 wow zoomIn" data-wow-delay="0.4s">
                            <h5 class="mb-3"><i class="fa fa-check text-primary me-3"></i>Responsive</h5>
                            
                        </div>
                    </div>
                    
                </div>
                <div class="col-lg-5" style="min-height: 500px;">
                    <div class="position-relative h-100">
                        <img class="position-absolute w-100 h-100 rounded wow zoomIn" data-wow-delay="0.9s" src="{{ asset('startup/img/auction.jpg')}}" style="object-fit: cover;">
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- About End -->
     <!-- Blog Start -->
     <div id="listbarang"class="container-fluid py-1 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container py-5">
            <div class="section-title text-center position-relative pb-3 mb-5 mx-auto" style="max-width: 600px;">
                <h5 class="fw-bold text-primary text-uppercase">ReyBidz</h5>
                <h1 class="mb-0">List Barang</h1>
            </div>
            <div class="row g-5">
                @forelse($lelang as $value)
                @if($value->status == 'dibuka')
                <div class="col-lg-4 wow slideInUp" data-wow-delay="0.3s">
                    <div class="blog-item bg-light rounded overflow-hidden">
                        <div class="blog-img position-relative overflow-hidden">
                            @if($value->barang->image)
                                <img src="{{ asset('storage/' . $value->barang->image)}}" alt="{{ $value->barang->nama_barang }}" class="img-fluid">
                            @endif
                            <a class="position-absolute top-0 start-0 bg-primary text-white rounded-end mt-5 py-2 px-4" href="">Di Lelang</a>    
                        </div>
                        <div class="p-4">
                            <div class="d-flex mb-3">
                                <small><i class="far fa-calendar-alt text-primary me-2"></i>{{ \Carbon\Carbon::parse($value->created_at)->format('j F Y')}}</small>
                            </div>
                            <h4 class="mb-3">{{ $value->barang->nama_barang}}</h4>
                            <h5 class="mb-3">@currency($value->barang->harga_awal)</h5>
                            <p>{{ $value->barang->deskripsi_barang }}</p>
                            <a class="text-uppercase" href="{{ route('lelangin.create', $value->id)}}">Read More <i class="bi bi-arrow-right"></i></a>
                        </div>
                    </div>
                </div>
                @endif    
                @empty
                <div class="card bg-light">
                    <div class="card-body">
                      <div class="row">
                        <div class="col-md-12">
                          <h2 class="card-title text-center">Tidak ada barang yang dilelang saat ini</h2>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-12">
                          <p class="text-muted text-center">Mohon maaf, saat ini tidak ada barang yang sedang dilelang. Silakan kembali lagi nanti.</p>
                          <p class="text-center mt-3">Namun jangan khawatir, kami akan terus memperbarui daftar barang yang akan dilelang. Silakan pantau terus website kami untuk mendapatkan informasi terbaru.</p>
                        </div>
                      </div>
                    </div>
                  </div>                         
                @endforelse
                </div>
            </div>
        </div>
        
    </div>
    <!-- Blog Start -->
    
    <!-- Footer Start -->
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-6 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100 bg-primary p-4">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-white"><i class="fa fas fa-gavel me-2"></i>ReyBidz</h1>
                        </a>
                        <p class="mt-3 mb-4">Mudah, aman dan terpercaya</p>
                        
                    </div>
                </div>
                <div class="col-lg-8 col-md-6">
                    <div class="row gx-5">
                        <div class="col-lg-4 col-md-12 pt-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Get In Touch</h3>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-geo-alt text-primary me-2"></i>
                                <p class="mb-0">SMKN 1 KARAWANG</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-primary me-2"></i>
                                <p class="mb-0">revalptraa935barus@gmail.com</p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-primary me-2"></i>
                                <p class="mb-0">+62 857 7073 9256</p>
                            </div>
                            <div class="d-flex mt-4">
                                <a class="btn btn-primary btn-square me-2" href="https://www.facebook.com/profile.php?id=100004275647319&mibextid=ZbWKwL"><i class="fab fa-facebook-f fw-normal"></i></a>
                                <a class="btn btn-primary btn-square" href="https://instagram.com/ptraarevaldy"><i class="fab fa-instagram fw-normal"></i></a>
                            </div>
                        </div>
                        
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">&copy; <a class="text-white border-bottom" href="">ReyBidz</a>. All Rights Reserved. 
						
						<!--/*** This template is free as long as you keep the footer author’s credit link/attribution link/backlink. If you'd like to use the template without the footer author’s credit link/attribution link/backlink, you can purchase the Credit Removal License from "https://htmlcodex.com/credit-removal". Thank you for your support. ***/-->
						Created By <a class="text-white border-bottom" href="https://github.com/RevaldyPutra">Revaldy Putra P.B</a></p>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Footer End -->


    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-primary btn-lg-square rounded back-to-top"><i class="bi bi-arrow-up"></i></a>

    <!-- Bootstrap 4 -->
<script src="{{ asset('adminlte/plugins/bootstrap/js/bootstrap.bundle.min.js')}}"></script>
<!-- AdminLTE App -->
<script src="{{ asset('adminlte/dist/js/adminlte.min.js')}}"></script>
<!-- AdminLTE for demo purposes -->
<script src="{{ asset('adminlte/dist/js/demo.js')}}"></script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="{{ asset('startup/lib/wow/wow.min.js')}}"></script>
    <script src="{{ asset('startup/lib/easing/easing.min.js')}}"></script>
    <script src="{{ asset('startup/lib/waypoints/waypoints.min.js')}}"></script>
    <script src="{{ asset('startup/lib/counterup/counterup.min.js')}}"></script>
    <script src="{{ asset('startup/lib/owlcarousel/owl.carousel.min.js')}}"></script>
    <!-- Latest compiled JavaScript -->
<script src="{{ asset('adminlte/dist/js/bootstrap.bundle.min.js')}}"></script>

    <!-- Template Javascript -->
    <script src="{{ asset('startup/js/main.js')}}"></script>
</body>

</html>