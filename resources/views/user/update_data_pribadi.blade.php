

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
                <div class="card-header">Edit Data Pribadi</div>

                <div class="card-body">
                    <!-- Menampilkan pesan sukses jika ada -->
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form untuk update data pribadi -->
                    <form action="{{ route('update.dataPribadi.siswa') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Nama -->
                        <div class="form-group mb-3">
                            <label for="name">Nama</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" name="name" value="{{ old('name', auth()->user()->name) }}" required>
                            @error('name')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- NISN -->
                        <div class="form-group mb-3">
                            <label for="nisn">NISN</label>
                            <input type="text" class="form-control @error('nisn') is-invalid @enderror" id="nisn" name="nisn" value="{{ old('nisn', auth()->user()->nisn) }}">
                            @error('nisn')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Agama -->
                        <div class="form-group mb-3">
                            <label for="agama">Agama</label>
                            <select class="form-control @error('agama') is-invalid @enderror" id="agama" name="agama">
                                <option value="" {{ old('agama', auth()->user()->agama) == null ? 'selected' : '' }}>Pilih Agama</option>
                                <option value="islam" {{ old('agama', auth()->user()->agama) == 'islam' ? 'selected' : '' }}>Islam</option>
                                <option value="kristen" {{ old('agama', auth()->user()->agama) == 'kristen' ? 'selected' : '' }}>Kristen</option>
                                <option value="katholik" {{ old('agama', auth()->user()->agama) == 'katholik' ? 'selected' : '' }}>Katholik</option>
                                <option value="hindu" {{ old('agama', auth()->user()->agama) == 'hindu' ? 'selected' : '' }}>Hindu</option>
                                <option value="budha" {{ old('agama', auth()->user()->agama) == 'budha' ? 'selected' : '' }}>Budha</option>
                                <option value="konghucu" {{ old('agama', auth()->user()->agama) == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                            </select>
                            @error('agama')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Alamat -->
                        <div class="form-group mb-3">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control @error('alamat') is-invalid @enderror" id="alamat" name="alamat">{{ old('alamat', auth()->user()->alamat) }}</textarea>
                            @error('alamat')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tanggal Lahir -->
                        <div class="form-group mb-3">
                            <label for="tgl_lahir">Tanggal Lahir</label>
                            <input type="date" class="form-control @error('tgl_lahir') is-invalid @enderror" id="tgl_lahir" name="tgl_lahir" value="{{ old('tgl_lahir', auth()->user()->tgl_lahir) }}">
                            @error('tgl_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tempat Lahir -->
                        <div class="form-group mb-3">
                            <label for="tempat_lahir">Tempat Lahir</label>
                            <input type="text" class="form-control @error('tempat_lahir') is-invalid @enderror" id="tempat_lahir" name="tempat_lahir" value="{{ old('tempat_lahir', auth()->user()->tempat_lahir) }}">
                            @error('tempat_lahir')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Gender -->
                        <div class="form-group mb-3">
                            <label for="gender">Jenis Kelamin</label>
                            <select class="form-control @error('gender') is-invalid @enderror" id="gender" name="gender">
                                <option value="1" {{ old('gender', auth()->user()->gender) == 1 ? 'selected' : '' }}>Laki-laki</option>
                                <option value="0" {{ old('gender', auth()->user()->gender) == 0 ? 'selected' : '' }}>Perempuan</option>
                            </select>
                            @error('gender')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Nomor HP -->
                        <div class="form-group mb-3">
                            <label for="hp">Nomor HP</label>
                            <input type="text" class="form-control @error('hp') is-invalid @enderror" id="hp" name="hp" value="{{ old('hp', auth()->user()->hp) }}">
                            @error('hp')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Sekolah -->
                        <div class="form-group mb-3">
                            <label for="sekolah">Sekolah</label>
                            <input type="text" class="form-control @error('sekolah') is-invalid @enderror" id="sekolah" name="sekolah" value="{{ old('sekolah', auth()->user()->sekolah) }}">
                            @error('sekolah')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit" class="btn btn-primary">Update Data Pribadi</button>
                        <a href="{{ route('edit.dataAyah.siswa') }}" class="btn btn-primary">Lanjutkan</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




