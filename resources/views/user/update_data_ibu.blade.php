<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Pengumuman Siswa Lolos Administrasi</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
</head>
<body>

<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Ibu</div>

                <div class="card-body">
                    <!-- Menampilkan pesan sukses jika ada -->
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form untuk update data ibu -->
                    <form action="{{ route('update.dataIbu.siswa') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Ibu -->
                        <div class="form-group mb-3">
                            <label for="nama_ibu">Nama Ibu</label>
                            <input type="text" class="form-control @error('nama_ibu') is-invalid @enderror" id="nama_ibu" name="nama_ibu" value="{{ old('nama_ibu', $siswa->nama_ibu) }}">
                            @error('nama_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir Ibu -->
                        <div class="form-group mb-3">
                            <label for="tgl_lahir_ibu">Tanggal Lahir Ibu</label>
                            <input type="date" class="form-control @error('tgl_lahir_ibu') is-invalid @enderror" id="tgl_lahir_ibu" name="tgl_lahir_ibu" value="{{ old('tgl_lahir_ibu', $siswa->tgl_lahir_ibu) }}">
                            @error('tgl_lahir_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nomor HP Ibu -->
                        <div class="form-group mb-3">
                            <label for="hp_ibu">Nomor HP Ibu</label>
                            <input type="text" class="form-control @error('hp_ibu') is-invalid @enderror" id="hp_ibu" name="hp_ibu" value="{{ old('hp_ibu', $siswa->hp_ibu) }}">
                            @error('hp_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Pendidikan Ibu -->
                        <div class="form-group mb-3">
                            <label for="pendidikan_ibu">Pendidikan Ibu</label>
                            <select class="form-control @error('pendidikan_ibu') is-invalid @enderror" id="pendidikan_ibu" name="pendidikan_ibu">
                                <option value="" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == null ? 'selected' : '' }}>Pilih Pendidikan</option>
                                <option value="sd" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'sd' ? 'selected' : '' }}>SD</option>
                                <option value="smp" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'smp' ? 'selected' : '' }}>SMP</option>
                                <option value="sma" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'sma' ? 'selected' : '' }}>SMA</option>
                                <option value="d1" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'd1' ? 'selected' : '' }}>D1</option>
                                <option value="d2" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'd2' ? 'selected' : '' }}>D2</option>
                                <option value="d3" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'd3' ? 'selected' : '' }}>D3</option>
                                <option value="d4/s1" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 'd4/s1' ? 'selected' : '' }}>D4/S1</option>
                                <option value="s2" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 's2' ? 'selected' : '' }}>S2</option>
                                <option value="s3" {{ old('pendidikan_ibu', $siswa->pendidikan_ibu) == 's3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Pendapatan Ibu -->
                        <div class="form-group mb-3">
                            <label for="pendapatan_ibu">Pendapatan Ibu (dalam Rupiah)</label>
                            <input type="number" class="form-control @error('pendapatan_ibu') is-invalid @enderror" id="pendapatan_ibu" name="pendapatan_ibu" value="{{ old('pendapatan_ibu', $siswa->pendapatan_ibu) }}">
                            @error('pendapatan_ibu')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit" class="btn btn-primary">Update Data Ibu</button>
                        <a href="{{ route('edit.dataJalur.siswa') }}" class="btn btn-primary">Lanjutkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




