

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
                <div class="card-header">Verifikasi Data Siswa</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <h5 class="mb-3">Informasi Siswa</h5>
                    <div class="mb-3">
                        <strong>Nama:</strong> {{ $siswa->name }}
                    </div>
                    <div class="mb-3">
                        <strong>Email:</strong> {{ $siswa->email }}
                    </div>
                    <div class="mb-3">
                        <strong>Nama Ayah:</strong> {{ $siswa->nama_ayah ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal Lahir Ayah:</strong> {{ $siswa->tgl_lahir_ayah ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>No. HP Ayah:</strong> {{ $siswa->hp_ayah ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Pendidikan Ayah:</strong> {{ $siswa->pendidikan_ayah ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Pendapatan Ayah:</strong> {{ $siswa->pendapatan_ayah ? 'Rp ' . number_format($siswa->pendapatan_ayah, 0, ',', '.') : 'Tidak Diisi' }}
                    </div>

                    <h5 class="mt-4 mb-3">Informasi Ibu</h5>
                    <div class="mb-3">
                        <strong>Nama Ibu:</strong> {{ $siswa->nama_ibu ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Tanggal Lahir Ibu:</strong> {{ $siswa->tgl_lahir_ibu ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>No. HP Ibu:</strong> {{ $siswa->hp_ibu ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Pendidikan Ibu:</strong> {{ $siswa->pendidikan_ibu ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Pendapatan Ibu:</strong> {{ $siswa->pendapatan_ibu ? 'Rp ' . number_format($siswa->pendapatan_ibu, 0, ',', '.') : 'Tidak Diisi' }}
                    </div>

                    <h5 class="mt-4 mb-3">Informasi Jalur</h5>
                    <div class="mb-3">
                        <strong>Jalur:</strong> {{ $siswa->jalur->nama_jalur ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Deskripsi Jalur:</strong> {{ $siswa->jalur->deskripsi ?? 'Tidak Diisi' }}
                    </div>
                    <div class="mb-3">
                        <strong>Biaya Jalur:</strong> {{ $siswa->jalur->biaya ? 'Rp ' . number_format($siswa->jalur->biaya, 0, ',', '.') : 'Tidak Diisi' }}
                    </div>

                    <div class="mt-4">
                        <a href="{{ route('edit.dataIbu.siswa') }}" class="btn btn-secondary">Edit Data Ibu</a>
                        <a href="{{ route('edit.dataAyah.siswa') }}" class="btn btn-secondary">Edit Data Ayah</a>
                        <a href="{{ route('edit.dataJalur.siswa') }}" class="btn btn-secondary">Edit Data Jalur</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




