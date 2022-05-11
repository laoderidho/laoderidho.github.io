<!DOCTYPE html>
<html lang="en">
<head>
   @include('master/header')
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
                    <a href="lamaran" class="nav-item nav-link">lamaran</a>
                    <a href="user" class="nav-item nav-link active">users</a>
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
                    <h1 class="display-4 text-white animated zoomIn">User</h1>                 
                </div>
            </div>
        </div>
    </div> 

    

    <table border="1" class="wow fadeInUp table table-striped">
        @if(session()->get('succes'))
        {{ session()->get('succes') }}
        @endif
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>email</th>
                <th>Password</th>
            </tr>
        </thead>
        <tbody>
            @foreach($user as $p)
            <tr>
                <td>{{ $p->id }}</td>
                <td>{{ $p->name }}</td>
                <td>{{ $p->email }}</td>
                <td>{{ $p->password }}</td>
                <td><a href="{{ route('user.edit', $p->id) }}">Edit</a></td>
                <td><form onsubmit="return confirm('Apakah anda yakin?');" action="{{ route('user.destroy', $p->id) }}" method="POST">
                @csrf
                @method('DELETE')
                <button type="submit">Delete</button>
                </form></td>
            @endforeach
        </tbody>
    </table>

    @include('master/footer')
</body>
</html>