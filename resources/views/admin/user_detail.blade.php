
<div class="container">
    <h1>Detail Pengguna: {{ $user->name }}</h1>

    {{-- User Information Card --}}
    <div class="card mb-4">
        <div class="card-header">
            Informasi Pengguna
        </div>
        <div class="card-body">
            {{-- User Photo --}}
            @if($user->foto)
                <div class="mb-3">
                    <img src="{{ asset('storage/'.$user->foto) }}" alt="Foto {{ $user->name }}" width="150" class="img-thumbnail">
                </div>
            @else
                <p><strong>Foto:</strong> Tidak ada foto tersedia.</p>
            @endif

            {{-- User Details --}}
            <p><strong>Nama:</strong> {{ $user->name }}</p>
            <p><strong>Email:</strong> {{ $user->email }}</p>
            <p><strong>NISN:</strong> {{ $user->nisn }}</p>
            <p><strong>Agama:</strong> {{ ucfirst($user->agama) }}</p>
            <p><strong>Jenis Kelamin:</strong> {{ $user->gender ? 'Laki-laki' : 'Perempuan' }}</p>
            <p><strong>Tempat, Tanggal Lahir:</strong> {{ $user->tempat_lahir }}, {{ $user->tgl_lahir }}</p>
            <p><strong>Alamat:</strong> {{ $user->alamat }}</p>
            <p><strong>Nomor HP:</strong> {{ $user->hp }}</p>
            <p><strong>Sekolah:</strong> {{ $user->sekolah }}</p>
            <p><strong>Jalur Pendaftaran:</strong> {{ $user->jalur->nama_jalur ?? 'Belum memilih jalur' }}</p>
            <p><strong>Status:</strong> {{ ucfirst($user->status) ?? 'Status belum ditentukan' }}</p>

            {{-- Parent Information --}}
            <h4>Informasi Orang Tua</h4>
            <p><strong>Nama Ayah:</strong> {{ $user->nama_ayah ?? 'Tidak ada data' }}</p>
            <p><strong>Tanggal Lahir Ayah:</strong> {{ $user->tgl_lahir_ayah ? $user->tgl_lahir_ayah  : 'Tidak ada data' }}</p>
            <p><strong>Nomor HP Ayah:</strong> {{ $user->hp_ayah ?? 'Tidak ada data' }}</p>
            <p><strong>Pendidikan Ayah:</strong> {{ ucfirst($user->pendidikan_ayah) ?? 'Tidak ada data' }}</p>
            <p><strong>Pendapatan Ayah:</strong> Rp {{ number_format($user->pendapatan_ayah, 2, ',', '.') ?? 'Tidak ada data' }}</p>

            <p><strong>Nama Ibu:</strong> {{ $user->nama_ibu ?? 'Tidak ada data' }}</p>
            <p><strong>Tanggal Lahir Ibu:</strong> {{ $user->tgl_lahir_ibu ? $user->tgl_lahir_ibu : 'Tidak ada data' }}</p>
            <p><strong>Nomor HP Ibu:</strong> {{ $user->hp_ibu ?? 'Tidak ada data' }}</p>
            <p><strong>Pendidikan Ibu:</strong> {{ ucfirst($user->pendidikan_ibu) ?? 'Tidak ada data' }}</p>
            <p><strong>Pendapatan Ibu:</strong> Rp {{ number_format($user->pendapatan_ibu, 2, ',', '.') ?? 'Tidak ada data' }}</p>
        </div>
    </div>

    {{-- Documents Section --}}
    <div class="card mb-4">
        <div class="card-header">
            Dokumen Pengguna
        </div>
        <div class="card-body">
            @if($user->dokumen->isNotEmpty())
                <ul>
                    @foreach($user->dokumen as $dokumen)
                        <li>
                            <strong>{{ ucfirst($dokumen->tipe_dokumen) }}:</strong>
                            <a href="{{ asset('storage/'.$dokumen->file) }}" target="_blank">
                                Lihat Dokumen
                            </a>
                        </li>
                    @endforeach
                </ul>
            @else
                <p>Belum ada dokumen yang diunggah.</p>
            @endif
        </div>
    </div>

    {{-- Back Button --}}
    <a href="{{ route('admin.user.index') }}" class="btn btn-secondary">Kembali ke Daftar Pengguna</a>
</div>

