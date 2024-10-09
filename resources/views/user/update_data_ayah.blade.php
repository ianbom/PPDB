

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
                <div class="card-header">Edit Data Ayah</div>

                <div class="card-body">
                    <!-- Menampilkan pesan sukses jika ada -->
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form untuk update data ayah -->
                    <form action="{{ route('update.dataAyah.siswa') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama Ayah -->
                        <div class="form-group mb-3">
                            <label for="nama_ayah">Nama Ayah</label>
                            <input type="text" class="form-control @error('nama_ayah') is-invalid @enderror" id="nama_ayah" name="nama_ayah" value="{{ old('nama_ayah', $siswa->nama_ayah) }}">
                            @error('nama_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir Ayah -->
                        <div class="form-group mb-3">
                            <label for="tgl_lahir_ayah">Tanggal Lahir Ayah</label>
                            <input type="date" class="form-control @error('tgl_lahir_ayah') is-invalid @enderror" id="tgl_lahir_ayah" name="tgl_lahir_ayah" value="{{ old('tgl_lahir_ayah', $siswa->tgl_lahir_ayah) }}">
                            @error('tgl_lahir_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nomor HP Ayah -->
                        <div class="form-group mb-3">
                            <label for="hp_ayah">Nomor HP Ayah</label>
                            <input type="text" class="form-control @error('hp_ayah') is-invalid @enderror" id="hp_ayah" name="hp_ayah" value="{{ old('hp_ayah', $siswa->hp_ayah) }}">
                            @error('hp_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Pendidikan Ayah -->
                        <div class="form-group mb-3">
                            <label for="pendidikan_ayah">Pendidikan Ayah</label>
                            <select class="form-control @error('pendidikan_ayah') is-invalid @enderror" id="pendidikan_ayah" name="pendidikan_ayah">
                                <option value="" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == null ? 'selected' : '' }}>Pilih Pendidikan</option>
                                <option value="sd" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'sd' ? 'selected' : '' }}>SD</option>
                                <option value="smp" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'smp' ? 'selected' : '' }}>SMP</option>
                                <option value="sma" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'sma' ? 'selected' : '' }}>SMA</option>
                                <option value="d1" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'd1' ? 'selected' : '' }}>D1</option>
                                <option value="d2" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'd2' ? 'selected' : '' }}>D2</option>
                                <option value="d3" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'd3' ? 'selected' : '' }}>D3</option>
                                <option value="d4/s1" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 'd4/s1' ? 'selected' : '' }}>D4/S1</option>
                                <option value="s2" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 's2' ? 'selected' : '' }}>S2</option>
                                <option value="s3" {{ old('pendidikan_ayah', $siswa->pendidikan_ayah) == 's3' ? 'selected' : '' }}>S3</option>
                            </select>
                            @error('pendidikan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Pendapatan Ayah -->
                        <div class="form-group mb-3">
                            <label for="pendapatan_ayah">Pendapatan Ayah (dalam Rupiah)</label>
                            <input type="number" class="form-control @error('pendapatan_ayah') is-invalid @enderror" id="pendapatan_ayah" name="pendapatan_ayah" value="{{ old('pendapatan_ayah', $siswa->pendapatan_ayah) }}">
                            @error('pendapatan_ayah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit" class="btn btn-primary">Update Data Ayah</button>
                        <a href="{{ route('edit.dataIbu.siswa') }}" class="btn btn-primary">Lanjutkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




