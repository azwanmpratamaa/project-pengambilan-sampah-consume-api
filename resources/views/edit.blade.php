<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

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

    <div class="container d-flex justify-content-center align-items-center">
        <form method="POST" action="{{ route('update', $sampahs['id']) }}" class="pt-1 px-4">
            @csrf
            @method('PATCH')
            <div class="text-left mt-1">
                <h1>Edit Data</h1>
            </div>
            <div class="position-relative mt-3  form-input">
                <label>Kepala Keluarga</label>
                <input name="kepala_keluarga" class="form-control" value="{{ $sampahs['kepala_keluarga'] }}"
                    type="text" placeholder="Masukan Kepala Keluarga">
            </div>
            <div class="position-relative mt-1  form-input">
                <label>No Rumah</label>
                <input name="no_rumah" class="form-control" value="{{ $sampahs['no_rumah'] }}" type="number"
                    placeholder="Masukan no_rumah">
            </div>
            <div class="position-relative mt-1  form-input">
                <label>RT/RW</label>
                <input name="rt_rw" class="form-control" value="{{ $sampahs['rt_rw'] }}" type="text"
                    placeholder="Masukan RT/RW">
            </div>
            <div class="position-relative mt-1  form-input">
                <label>Total Karung Sampah</label>
                <input name="total_karung_sampah" class="form-control" value="{{ $sampahs['total_karung_sampah'] }}"
                    type="text" placeholder="Masukan Total Karung">
            </div>
            <div class="position-relative mt-1  form-input ">
                <label>Tanggal Pengangkutan</label>
                <input name="tanggal_pengangkutan" class="form-control" value="{{ $sampahs['tanggal_pengangkutan'] }}"
                    type="text" placeholder="Masukan tanggal">
            </div>
            <br>
            <button type="submit" class="btn btn-primary w-100">Kirim</button>
        </form>
    </div>
</body>
</html>
