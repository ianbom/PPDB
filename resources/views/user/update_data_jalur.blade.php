

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

    @section('content')
<div class="container mt-5">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Edit Data Jalur</div>

                <div class="card-body">
                    @if(session('message'))
                        <div class="alert alert-success">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form action="{{ route('update.dataJalur.siswa') }}" method="POST">
                        @csrf
                        @method('PUT')

                        <!-- Pilihan Jalur -->
                        <div class="form-group mb-3">
                            <label for="id_jalur">Jalur</label>
                            <select class="form-control @error('id_jalur') is-invalid @enderror" id="id_jalur" name="id_jalur" onchange="showDetails()">
                                <option value="">Pilih Jalur</option>
                                @foreach($jalur as $j)
                                    <option value="{{ $j->id_jalur }}" {{ old('id_jalur', $siswa->id_jalur) == $j->id_jalur ? 'selected' : '' }}
                                            data-deskripsi="{{ $j->deskripsi }}"
                                            data-biaya="{{ $j->biaya }}">
                                        {{ $j->nama_jalur }}
                                    </option>
                                @endforeach
                            </select>
                            @error('id_jalur')
                                <div class="invalid-feedback">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>

                        <!-- Deskripsi Jalur -->
                        <div class="form-group mb-3">
                            <label for="deskripsi">Deskripsi Jalur</label>
                            <textarea class="form-control" id="deskripsi" rows="3" readonly></textarea>
                        </div>

                        <!-- Biaya Jalur -->
                        <div class="form-group mb-3">
                            <label for="biaya">Biaya Jalur</label>
                            <input type="text" class="form-control" id="biaya" readonly>
                        </div>

                        <!-- Tombol submit -->
                        <button type="submit" class="btn btn-primary">Update Data Jalur</button>
                        <a href="{{ route('index.verifikasi.siswa') }}" class="btn btn-info">Selesai</a>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    function showDetails() {
        const selectElement = document.getElementById('id_jalur');
        const selectedOption = selectElement.options[selectElement.selectedIndex];

        const deskripsiField = document.getElementById('deskripsi');
        const biayaField = document.getElementById('biaya');

        if (selectedOption.value) {
            deskripsiField.value = selectedOption.getAttribute('data-deskripsi');
            biayaField.value = selectedOption.getAttribute('data-biaya');
        } else {
            deskripsiField.value = '';
            biayaField.value = '';
        }
    }

    // Memanggil fungsi showDetails() untuk mengatur nilai awal
    document.addEventListener('DOMContentLoaded', (event) => {
        showDetails();
    });
</script>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>




