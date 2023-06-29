<!DOCTYPE html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">

    <title>Hello, world!</title>
  </head>
  <body>
    @if (Session::get('errors'))
        <p style="padding: 5px 10px; background: red; color: white; margin: 10px;">{{ Session:get('errors') }}</p>
    @endif
    @if (Session::get('success'))
        <p style="padding: 5px 10px; background: green; color: white; margin: 10px">{{ Session::get('success') }}</p>
    @endif

    <nav class="navbar navbar-expand-lg navbar-dark bg-success">
      <div class="container">
          <a class="navbar-brand" href="{{url('/')}}">Pengambilan Sampah</a>
              <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                  <span class="navbar-toggler-icon"></span>
              </button>
      <div class="collapse navbar-collapse" id="navbarNav">
          <ul class="navbar-nav">
              <li class="nav-item active">
                  <a class="nav-link" href="{{url('/')}}">Home</a>
              </li>
          </ul>
      </div>
      </div>
  </nav>
  
  </body>

    <div class="container my-5">    
  <table class="table table-bordered table-success my-4">
  <thead>
    <tr>
      <th scope="col">No</th>
      <th scope="col">Kepala Keluarga</th>
      <th scope="col">No Rumah</th>
      <th scope="col">RT/RW</th>
      <th scope="col">Total</th>
      <th scope="col">Kriteria</th>
      <th scope="col">Tanggal Angkut</th>
      <th scope="col">Action</th>
    </tr>
  </thead>
  <tbody>
    @foreach($sampahsTrash as $samp)
    <tr>
      <th scope="row">{{ $loop->iteration }}</th>
      <td>{{ $samp['kepala_keluarga'] }}</td>
      <td>{{ $samp['no_rumah'] }}</td>
      <td>{{ $samp['rt_rw'] }}</td>
      <td>{{ $samp['total_karung_sampah'] }}</td>
      <td>{{ $samp['kriteria'] }}</td>
      <td>{{ $samp['tanggal_pengangkutan'] }}</td>
      <td>
       <!-- <a href="/sampah/delete/{{$samp['id']}}" class="btn btn-danger">delete</button> -->
       <form action="{{route ('restore', $samp['id'])}}" method="">
        @csrf
        @method('GET')
        <button type="submit" class="btn btn-primary">Restore</button>
        <a href="{{route ('permanent', $samp['id'])}}" class="btn btn-danger">Permanent</a>
       </form>
      </td>
    </tr>
    @endforeach
  </tbody>
</table>

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>
    -->
  </body>
</html>