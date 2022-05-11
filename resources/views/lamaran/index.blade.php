<!DOCTYPE html>
<html lang="en">
<head>
    @include('master.header')
    <title>Tabel Lamaran</title>
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
                    <a href="perusahaan" class="nav-item nav-link ">Perusahaan</a>
                    <a href="lamaran" class="nav-item nav-link active">lamaran</a>
                    <a href="user" class="nav-item nav-link">users</a>
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
                    <h1 class="display-4 text-white animated zoomIn">Lamaran</h1>                 
                </div>
            </div>
        </div>
    </div> 

    <p><a href="{{ route('lamaran.create') }}" class="btn btn-primary">Tambah Lamaran</a></p>
    

    <table border="1" class="table table-striped">
       @if(session()->get('success'))
        <div class="alert alert-success">
        {{ session()->get('success') }}
        </div>
    @endif
        <thead>
            <tr>
                <th>ID</th>
                <th>Id Users</th>
                <th>Id perusahaan</th>
                <th>ktp</th>
                <th>cv</th>
                <th>surat Lamaran</th>
                <th>ijazah</th>
                <th>prestasi</th>
                <th>pengalaman</th>
                <th>status Penerimaan</th>
                <th>Edit</th>
                <th>Delete</th>
            </tr>
        </thead>
        <tbody>
            @foreach($lamaran as $l)
            <tr>
                <td>{{ $l->id }}</td>
                <td>{{ $l->user->name }}</td>
                <td>{{ $l->perusahaan_id }}</td>
                <td><a class=" btn btn-primary" href="{{ asset('storage/' . $l->ktp) }}">Download</a></td>
                <td><a class=" btn btn-primary" href="{{ asset('storage/' . $l->cv) }}">Download</a></td>
                <td><a class=" btn btn-primary" href="{{ asset('storage/' . $l->surat_lamaran) }}">Download</a></td>
                <td><a class=" btn btn-primary" href="{{ asset('storage/' . $l->ktp) }}">Download</a></td>
                <td><a class=" btn btn-primary" href="{{ asset('storage/' . $l->ktp) }}">Download</a></td>
                <td>{{ $l->pengalaman }}</td>
                <td>{{ $l->status_penerimaan }}</td>
                <td><a href="{{ route('lamaran.edit', $l->id) }}">Edit</a></td>
                <td><form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('lamaran.destroy', $l->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button class="btn btn-primary" type="submit">Delete</button>
                </form></td>
            </tr>
            @endforeach
        </tbody>
    </table>

    @include('master.footer')
</body>
</html>