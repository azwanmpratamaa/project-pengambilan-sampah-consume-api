<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Consume REST API Pengambilan Sampah</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
</head>

<body>
    <form action="" method="get">
        @csrf

        <nav class="navbar navbar-expand-lg navbar-dark bg-success">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">Pengambilan Sampah</a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav"
                    aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span></button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/') }}"><i class="bi bi-houses-fill"></i></a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ url('/trash') }}"><i class="bi bi-recycle"></i></a>
                        </li>
                    </ul>
                    <form class="" style="width:100px">
                        <div class="input-group">
                            <input class="form-control" name="search" type="text" placeholder="Search for..."
                                aria-label="Search for..." aria-describedby="btnNavbarSearch" />
                            <button class="btn" id="btnNavbarSearch" type="submit"><i
                                    class="fas fa-search"></i></button>
                        </div>
                    </form>
                </div>
            </div>
        </nav>



    </form>
    <br>
    <a class="btn btn-success mb-4" href="{{ route('add') }}">Tambah Data Baru</a>

    @if (Session::get('success'))
        <p style="padding: 5px 10px; background: green; color: white; margin: 10px">{{ Session::get('success') }}</p>
    @endif

    <table class="table table-striped table-hover">
        <tr class="text-center">
            <th>No</th>
            <th>Kepala Keluarga</th>
            <th>Nomor Rumah</th>
            <th>RT RW</th>
            <th>Total Karung Sampah</th>
            <th>Kriteria</th>
            <th>Tanggal Pengangkutan</th>
            <th>Aksi</th>


            @php
                $no = 1;
            @endphp

            @foreach ($sampahs as $samp)
        <tr class="text-center">
            <td>{{ $no++ }}</td>
            <td>{{ $samp['kepala_keluarga'] }}</td>
            <td>{{ $samp['no_rumah'] }}</td>
            <td>{{ $samp['rt_rw'] }}</td>
            <td>{{ $samp['total_karung_sampah'] }}</i>
            <td>{{ $samp['kriteria'] }}</i>
            <td>{{ $samp['tanggal_pengangkutan'] }}</i>
            <td style="display:flex" class="text-center">
                <a style="float: left; margin-right: 5px;" class="btn btn-primary btn-sm"
                    href="{{ route('edit', $samp['id']) }}"><i class="bi bi-pencil-fill"></i>Edit</a>
                <form action="{{ route('delete', $samp['id']) }}" method="POST">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="btn btn-danger btn-sm"><i class="bi bi-trash3-fill"></i>Hapus</button>
                </form>
            </td>
        </tr>
        @endforeach
        </tr>
    </table>
</body>

</html>
