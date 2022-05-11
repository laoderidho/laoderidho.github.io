<!DOCTYPE html>
<html lang="en">
<head>
   @include('master/header')
    <title>Perusahaan</title>
</head>
<body>

    <div class="card container mt-5 p-3 ">
        <div class="col">
        @if ($errors->any())
        <div class="alert alert-danger">
            <strong>Something wrong</strong>
            <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
        @endforeach
        @endif
        </div>
        <h2 class="d-flex display-5 justify-content-center"><i class="fa fa-user">Buru Pekerja</i></h2>
        <form action="{{ route('perusahaan.update', $perusahaan->id) }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')
        <div class="row">

        <div class="col-sm-6">
            <label>Nama :</label>
            <input type="text" class="form-control" name="nama_perusahaan" value="{{ $perusahaan->nama_perusahaan }}">
        </div>

        <div class="col-sm-6">
            <label for="">Email:</label>
            <input type="email" class="form-control" name="email" value="{{ $perusahaan->email }}">
        </div>
      
        <div class="col-sm-6">
            <label for="">username</label> <br>
            <input type="text" class="form-control" name="username" value="{{ $perusahaan->username }}">
        </div>
        
        <div class="col-sm-6">
            <label for="">Password:</label>
            <input type="password" class="form-control" name="password" value="{{ $perusahaan->password }}">
        </div>
       <div class="col-sm-6">
        <label for="keterangan_perusahaan">Keterangan Perusahaan</label>
       <select class="form-select" name="ket_perusahaan">
            <option selected>Pilih salah satu</option>
            <option value="Manufaktur">Manufaktur</option>
            <option value="Jaringan">Jaringan</option>
            <option value="Buruh">Buruh</option>
            <option value="akuntan">Akuntan</option>
            <option value="manajemen">Manajemen</option>
            <option value="Kerja Biasa">Kerja Biasa</option>
            <option value="IT">IT</option>
            <option value="Dokter">Dokter</option>
            <option value="Psikolog">Psikolog</option>
            <option value="Tambang">Tambang</option>
            <option value="Sales">Sales</option>
            <option value="Dan lain lain">DLL</option>
        </select>
       </div>
        
        <div class="col-sm-6">
            <label for="">syarat:</label>
            <input type="text" class="form-control" name="syarat" value="{{ $perusahaan->syarat }}">
        </div>
        
       <div class="col-sm-6">
       <label for="">Rating:</label><br>
            <input type="radio" class="form-radio" name="akreditasi" value="Baik Sekali">5 bintang
            <input type="radio" class="form-radio" name="akreditasi" value="Baik "> 4 bintang
            <input type="radio" class="form-radio" name="akreditasi" value="Cukup"> 3 bintang
            <input type="radio" class="form-radio" name="akreditasi" value="Kurang"> 2 Bintang
            <input type="radio" class="form-radio" name="akreditasi" value="Kurang Sekali"> 1 Bintang
       </div>
     
        <div class="col-sm-6">
            <input type="hidden" id="input" class="form-control" name="oldImage" value="{{ $perusahaan->logo }}" >
        </div>
        <div class="col-sm-6">
            <label for="input">Logo:</label>
            <input type="file" id="input" class="form-control" name="logo">
        </div>
        <div class="col-sm-6">
            <label for="">Alamat</label>
            <textarea name="alamat" class="form-control" id="" cols="10" rows="2">{{ $perusahaan->alamat }}</textarea>
        </div>

        <div class="col-sm-6">
            <label for="">Deskripsi:</label>
            <textarea name="deskripsi" class="form-control" id="" cols="10" rows="2">{{ $perusahaan->deskripsi }}</textarea>
        </div>

        <div class="col-12 d-flex justify-content-center">
            <button type="submit" class="btn btn-primary form-control mt-3 m-3">Save</button>
            <button type="reset" class="btn btn-danger form-control mt-3 m-3">Reset</button>
        </div>
        </form>
    </div>
    </div>
</body>
</html>