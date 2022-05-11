@include('master/header')
<head>
   <title>Home</title>
</head>
@include('master/spinner')

<!-- Navbar & Carousel Start -->
<div class="container-fluid position-rlative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark  px-5 py-3 py-lg-0">
            <a href="#" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Buru Pekerja</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav py-0">
                    <a href="/" class="nav-item nav-link active ">Home</a> 
                    <a href="perusahaan" class="nav-item nav-link">Perusahaan</a>
                    @can('admin')
                    <a href="lamaran" class="nav-item nav-link">lamaran</a>
                    <a href="user" class="nav-item nav-link">User</a>
                    @endcan
                </div>
                @auth
                <div class="navbar-nav py-0 mt-3 ms-auto">
                    <a href="#" class="nav-item nav-link"><i class="fa fa-user-tie"></i>{{ auth()->user()->name }}</a>
                    <form action="{{ route('logout') }}" method="POST">
                        @csrf
                            <button type="submit" class=" btn btn-primary" id="logout"><i class="bi bi-box-arrow-in-right"></i>Logout</button>
                    </form>
                </div>
                @else
                <div class="navbar-nav py-0 mt-3 ms-auto">  
                        <a href="/login" class="nav-link nav-item"><i class="bi bi-box-arrow-in-right"></i> Login</a>
                    </div>
                @endauth
            </div>
        </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="w-100" src="{{ asset('image/carousel-2.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Tempat mencari Pekerjaan anda</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Apakah Anda Ingin mencari Pekerjaan ?</h1>
                            <a href="perusahaan" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Cari Sekarang </a>
                        </div>
                    </div>
                </div>
                <div class="carousel-item">
                    <img class="w-100" src="{{ asset('image/carousel-1.jpg') }}" alt="Image">
                    <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                        <div class="p-3" style="max-width: 900px;">
                            <h5 class="text-white text-uppercase mb-3 animated slideInDown">Tempat Mencari Pekerjaan Anda</h5>
                            <h1 class="display-1 text-white mb-md-4 animated zoomIn">Jika Mencari Pekerjaan Di Sini Lah Tempatnya</h1>
                            <a href="quote.html" class="btn btn-primary py-md-3 px-md-5 me-3 animated slideInLeft">Tentang Penulis</a>
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

    <div class="container text-center  section-title position-relative wow fadeInUp p-2" data-wow-delay="0.1s" >
        <h1 class="display-4">Tentang Website Ini</h1>
    </div>
    
    <div class="container m-5">
        <h1>Kata Pengantar Penulis</h1>
        <h5>Terima Kasih kami kepada yang telah mengakses Website ini, Sesungguhnya website ini 
            di buat agar Para penjelajah bisa sedikit Melihat Website yang saya kembangkan 
            Struktur Website ini pun adalah tidak lain hanya untuk Project dan memberi sebuah pembelajaran
            bagi kita semua  <br><br> ada beberapa rangkaian Webiste ini adalah tidak lain untuk agar 
            menjadi sebuah pelajaran di antaranya menggunanan framework Laravel salah satu Framework 
            yang sangat banyak di minati <br><br> Ini tidak lain hanya sebagai contoh dalam CRUD laravel yang
            tidak sempurna di karenakan ini hanya demo dan lebih mementingkan desain yang kurang responsive
            <br><br>jadi bagi yang ingin ke sini maka jadikan saja sebagai contoh 
        </h5>
    </div>


@include('master/footer')