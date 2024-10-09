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
                <div class="card-header">Update Foto Profil</div>

                <div class="card-body">
                    <!-- Menampilkan pesan sukses jika ada -->
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <!-- Form untuk update foto -->
                    <form action="{{ route('update.profile.siswa') }}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                        <!-- Menampilkan foto profil saat ini -->
                        <div class="form-group mb-4">
                            <label for="current_foto">Foto Profil Saat Ini:</label><br>
                            @if(auth()->user()->foto)
                                <img src="{{ asset('storage/' . auth()->user()->foto) }}" alt="Foto Profil" class="img-thumbnail" width="150">
                            @else
                                <p>Belum ada foto profil</p>
                            @endif
                        </div>

                        <!-- Input untuk upload foto baru -->
                        <div class="form-group mb-3">
                            <label for="foto">Pilih Foto Baru</label>
                            <input type="file" class="form-control @error('foto') is-invalid @enderror" id="foto" name="foto">
                            @error('foto')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit" class="btn btn-primary">Update Foto</button>
                        @if(auth()->user()->foto)
                        <a href="{{ route('edit.dataPribadi.siswa') }}" class="btn btn-primary">Lanjutkan</a>
                        @endif
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




