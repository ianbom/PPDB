
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
                    <div class="card-header bg-danger text-white">
                        <h4>Mohon Maaf, Anda Tidak Lolos</h4>
                    </div>

                    <div class="card-body">
                        <p class="lead">Halo {{ $siswa->name }}, mohon maaf Anda belum berhasil lolos seleksi di sekolah kami.</p>

                        {{-- Informasi siswa --}}
                        <table class="table table-bordered">
                            <tr>
                                <th>Nama:</th>
                                <td>{{ $siswa->name }}</td>
                            </tr>
                            <tr>
                                <th>Email:</th>
                                <td>{{ $siswa->email }}</td>
                            </tr>
                            <tr>
                                <th>NISN:</th>
                                <td>{{ $siswa->nisn }}</td>
                            </tr>
                            <tr>
                                <th>Jalur Pendaftaran:</th>
                                <td>{{ $siswa->jalur->nama_jalur ?? 'Belum memilih jalur' }}</td>
                            </tr>
                            <tr>
                                <th>Status:</th>
                                <td class="text-danger"><strong>{{ ucfirst($siswa->status) }}</strong></td>
                            </tr>
                        </table>

                        {{-- Pesan tindak lanjut --}}
                        <div class="alert alert-warning">
                            <strong>Informasi:</strong> Anda dapat mencoba mendaftar kembali pada kesempatan berikutnya. Terima kasih atas partisipasi Anda dalam proses seleksi ini.
                        </div>

                        <a href="{{ route('dashboard') }}" class="btn btn-primary">Kembali ke Dashboard</a>
                    </div>
                </div>
            </div>
        </div>
    </div>


    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




