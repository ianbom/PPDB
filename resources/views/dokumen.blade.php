<div class="container">
    <h1>Dokumen aAnda</h1>

    <!-- Display Documents -->
    <div class="row">
        <div class="col-md-6">
            <h3>Kartu Keluarga (KK)</h3>
            @if($kk)
            <p>{{ $kk->file }}</p>
                <p><a href="{{ asset('storage/' . $kk->file) }}" target="_blank">Lihat KK</a></p>
            @else
                <p>Belum ada dokumen KK.</p>
            @endif
                <!-- Form to Update KK -->
    <form action="{{ route('dokumen.updateKK') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="kk">Upload KK Baru</label>
            <input type="file" name="kk" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update KK</button>
    </form>
        </div>

        <div class="col-md-6">
            <h3>Ijazah</h3>
            @if($ijazah)
            <p>{{ $ijazah->file }}</p>
                <p><a href="{{ asset('storage/' . $ijazah->file) }}" target="_blank">Lihat Ijazah</a></p>
            @else
                <p>Belum ada dokumen Ijazah.</p>
            @endif
                <!-- Form to Update Ijazah -->
    <form action="{{ route('dokumen.updateIjazah') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="ijazah">Upload Ijazah Baru</label>
            <input type="file" name="ijazah" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update Ijazah</button>
    </form>
        </div>

        <div class="col-md-6">
            <h3>Raport</h3>
            @if($raport)
            <p>{{ $raport->file }}</p>
                <p><a href="{{ asset('storage/' . $raport->file) }}" target="_blank">Lihat Raport</a></p>
            @else
                <p>Belum ada dokumen Raport.</p>
            @endif
              <!-- Form to Update Raport -->
    <form action="{{ route('dokumen.updateRaport') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="raport">Upload Raport Baru</label>
            <input type="file" name="raport" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update Raport</button>
    </form>
        </div>

        <div class="col-md-6">
            <h3>Dokumen Tambahan</h3>
            @if($tambahan)
            <p>{{ $tambahan->file }}</p>
                <p><a href="{{ asset('storage/' . $tambahan->file) }}" target="_blank">Lihat Dokumen Tambahan</a></p>
            @else
                <p>Belum ada dokumen Tambahan.</p>
            @endif
                <!-- Form to Update Tambahan -->
    <form action="{{ route('dokumen.updateTambahan') }}" method="POST" enctype="multipart/form-data">
        @csrf
        <div class="form-group mt-4">
            <label for="tambahan">Upload Dokumen Tambahan Baru</label>
            <input type="file" name="tambahan" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-primary mt-2">Update Dokumen Tambahan</button>
    </form>
        </div>
    </div>








</div>

