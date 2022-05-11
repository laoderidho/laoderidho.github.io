<!DOCTYPE html>
<html lang="en">
<head>
    @include('master/header')
    <title>Perusahaan</title>
</head>
<body>
@include('master/spinner')
    <!-- Navbar Start -->
    <div class="container-fluid position-relative p-0">
        <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
            <a href="index.html" class="navbar-brand p-0">
                <h1 class="m-0"><i class="fa fa-user-tie me-2"></i>Buru Pekerja</h1>
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                <span class="fa fa-bars"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarCollapse">
                <div class="navbar-nav  py-0">
                    <a href="/" class="nav-item nav-link ">Home</a> 
                    <a href="perusahaan" class="nav-item nav-link active">Perusahaan</a>
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
            </div>
        </nav>

        <div class="container-fluid bg-primary py-5 bg-header" style="margin-bottom: 90px;">
            <div class="row py-5">
                <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                    <h1 class="display-4 text-white animated zoomIn">Perusahaan</h1>
                   
                </div>
            </div>
        </div>
    </div>
    <!-- Navbar End -->

    <div class="container text-center section-title position-relative wow fadeInUp" data-wow-delay="0.1s" >
        <h1 class="display-3 p-3 ">Temukan Perusahaan Favoritmu</h1>
    </div>

        <a class="btn btn-primary" href="{{ route('perusahaan.create') }}"> tambah Perusahaan</a>
        <br><br><br>
        <div class="container-fluid row">
            @foreach($perusahaan as $p)
            <div class="card m-2 col-sm-3 p-5 wow fadeInUp" data-wow-delay="0.1s" style="width: 30rem;" >
            <div class="d-flex justify-content-center">
                        @if('$p->logo')
                        <img src="{{ asset('storage/' . $p->logo) }}" width="200px" height="200px" alt="name">
                        @endif
                    </div>
            <div class="card-body ">
                <h1 class="card-title text-center">{{ $p->nama_perusahaan }}</h1><br>
                <h5 class="card-item">Email Perusahaan : {{ $p->email }}</h5><br>
                <h5 class="card-item">Keterangan Perusahaan : <br>{{ $p->ket_perusahaan }}</h5><br>
                <h5 class="card-item">Syarat :<br> {{ $p->syarat }}</h5><br>
                <h5 class="card-item">Akreditasi :<br> {{ $p->akreditasi }}</h5><br>
                <h5 class="card-item">Deskripsi :<br> {{ $p->deskripsi }}</h5><br>
                <h5 class="card-item">Alamat :<br> {{ $p->alamat }}</h5><br>
                @can('admin')
                <a class="btn btn-primary" href="{{ route('perusahaan.edit', $p->id) }}">Edit</a>
                <form class="btn " onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('perusahaan.destroy', $p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-danger" type="submit">Delete</button>
                </form>
                @endcan
                <a href="{{ route('lamaran.create') }}" class="btn btn-primary">Lamar Sekarang</a>
            </div>
            </div>
            @endforeach
        </div>

        @include('master.footer')
</body>
</html>