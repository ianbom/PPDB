<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>User Edit</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  </head>
  <body>
    <div class="container">
        <h1>Edit Profil Pengguna</h1>

        {{-- Display validation errors --}}
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        {{-- Edit Form --}}
        <form action="{{ route('user.update') }}" method="POST" enctype="multipart/form-data">
            @csrf
            @method('PUT')

            {{-- Jalur Pendaftaran --}}
            <div class="form-group">
                <label for="id_jalur">Jalur Pendaftaran</label>
                <select name="id_jalur" class="form-control">
                    <option value="">Pilih Jalur</option>
                    @foreach($jalur as $option)
                        <option value="{{ $option->id_jalur }}" {{ $user->id_jalur == $option->id_jalur ? 'selected' : '' }}>
                            {{ $option->nama_jalur }}
                        </option>
                    @endforeach
                </select>
            </div>

            {{-- Nama --}}
            <div class="form-group">
                <label for="name">Nama</label>
                <input type="text" name="name" class="form-control" value="{{ old('name', $user->name) }}" required>
            </div>

            {{-- Foto --}}
            <div class="form-group">
                <label for="foto">Foto</label>
                <input type="file" name="foto" class="form-control-file">
                @if($user->foto)
                    <p>Foto saat ini: <img src="{{ asset('storage/'.$user->foto) }}" alt="Foto Profil" width="100"></p>
                @endif
            </div>

            {{-- NISN --}}
            <div class="form-group">
                <label for="nisn">NISN</label>
                <input type="text" name="nisn" class="form-control" value="{{ old('nisn', $user->nisn) }}">
            </div>

            {{-- Agama --}}
            <div class="form-group">
                <label for="agama">Agama</label>
                <select name="agama" class="form-control">
                    <option value="">Pilih Agama</option>
                    <option value="islam" {{ $user->agama == 'islam' ? 'selected' : '' }}>Islam</option>
                    <option value="kristen" {{ $user->agama == 'kristen' ? 'selected' : '' }}>Kristen</option>
                    <option value="katholik" {{ $user->agama == 'katholik' ? 'selected' : '' }}>Katholik</option>
                    <option value="hindu" {{ $user->agama == 'hindu' ? 'selected' : '' }}>Hindu</option>
                    <option value="budha" {{ $user->agama == 'budha' ? 'selected' : '' }}>Budha</option>
                    <option value="konghucu" {{ $user->agama == 'konghucu' ? 'selected' : '' }}>Konghucu</option>
                </select>
            </div>

            {{-- Gender --}}
            <div class="form-group">
                <label for="gender">Jenis Kelamin</label>
                <select name="gender" class="form-control" required>
                    <option value="1" {{ $user->gender == 1 ? 'selected' : '' }}>Laki-laki</option>
                    <option value="0" {{ $user->gender == 0 ? 'selected' : '' }}>Perempuan</option>
                </select>
            </div>

            {{-- Tanggal Lahir --}}
            <div class="form-group">
                <label for="tgl_lahir">Tanggal Lahir</label>
                <input type="date" name="tgl_lahir" class="form-control" value="{{ old('tgl_lahir', $user->tgl_lahir) }}">
            </div>

            {{-- Tempat Lahir --}}
            <div class="form-group">
                <label for="tempat_lahir">Tempat Lahir</label>
                <input type="text" name="tempat_lahir" class="form-control" value="{{ old('tempat_lahir', $user->tempat_lahir) }}">
            </div>

            {{-- Alamat --}}
            <div class="form-group">
                <label for="alamat">Alamat</label>
                <textarea name="alamat" class="form-control">{{ old('alamat', $user->alamat) }}</textarea>
            </div>

            {{-- Sekolah --}}
            <div class="form-group">
                <label for="sekolah">Sekolah</label>
                <input type="text" name="sekolah" class="form-control" value="{{ old('sekolah', $user->sekolah) }}">
            </div>

            {{-- HP --}}
            <div class="form-group">
                <label for="hp">Nomor HP</label>
                <input type="text" name="hp" class="form-control" value="{{ old('hp', $user->hp) }}">
            </div>

            {{-- Status --}}
            <div class="form-group">
                <label for="status">Status Pendaftaran</label>
                <select name="status" class="form-control">
                    <option value="verifikasi_data" {{ $user->status == 'verifikasi_data' ? 'selected' : '' }}>Verifikasi Data</option>
                    <option value="lolos_administrasi" {{ $user->status == 'lolos_administrasi' ? 'selected' : '' }}>Lolos Administrasi</option>
                    <option value="diterima" {{ $user->status == 'diterima' ? 'selected' : '' }}>Diterima</option>
                    <option value="ditolak" {{ $user->status == 'ditolak' ? 'selected' : '' }}>Ditolak</option>
                </select>
            </div>

            {{-- Nama Ayah --}}
            <div class="form-group">
                <label for="nama_ayah">Nama Ayah</label>
                <input type="text" name="nama_ayah" class="form-control" value="{{ old('nama_ayah', $user->nama_ayah) }}">
            </div>

            {{-- Nama Ibu --}}
            <div class="form-group">
                <label for="nama_ibu">Nama Ibu</label>
                <input type="text" name="nama_ibu" class="form-control" value="{{ old('nama_ibu', $user->nama_ibu) }}">
            </div>

            {{-- Buttons --}}
            <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
            <a href="{{ route('user.show') }}" class="btn btn-secondary">Batal</a>
        </form>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
  </body>
</html>

