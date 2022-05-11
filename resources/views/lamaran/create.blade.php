<!DOCTYPE html>
<html lang="en">
<head>
    @include('master.header')
    <title>Lamaran</title>
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
        <form action="{{ route('lamaran.store') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="row">

       <div class="col-sm-6">
       <label>User Id</label>
        <select class="form-control" name="user_id">
            <option value="">Choose user</option>
            @foreach($users as $p)
                <option value="{{ $p->id }}">
                {{ $p->name }}
            </option>
            @endforeach
        </select>
       </div>


      <div class="col-sm-6">
          <label for="">Perusahaan Id</label>
          <select class="form-control" name="perusahaan_id" id="">
              <option value="">Choser Perusahaan</option>
                @foreach($perusahaans as $p)
                    <option value="{{ $p->id }}">
                        {{ $p->nama_perusahaan }}
                    </option>
                @endforeach
          </select>
      </div>


     
        <div class="col-sm-6">
            <label for="">Ktp:</label>
            <input type="file" class="form-control" name="ktp" >
        </div>

       
       
        <div class="col-sm-6">
            <label for="">CV:</label>
            <input type="file" class="form-control" name="cv">
        </div>
        
        <div class="col-sm-6">
            <label for="input">Surat Lamaran:</label>
            <input type="file" id="input" class="form-control" name="surat_lamaran">
        </div>
       
        

        <div class="col-sm-6">
            <label for="">ijazah</label>
            <input type="file" class="form-control" name="ijazah">
        </div>

        
        <div class="col-sm-6">
            <label for="">prestasi:</label>
            <input type="file" class="form-control" name="prestasi">
        </div>

        
        <div class="col-sm-6">
            <label for="">Pengalaman:</label>
           <textarea class="form-control" name="pengalaman" id="" cols="2" rows="2"></textarea>
        </div>
        <div class="col-sm-6">
            <label for="">Status penerimaan:</label><br>
                    <input type="radio" class="form-radio" name="status_penerimaan" value="Setuju">Setuju
                    <input type="radio" class="form-radio" name="status_penerimaan" value="Tidak Setuju"> Tidak Setuju
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