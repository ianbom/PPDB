<div class="container">
    <h1 class="mb-4">Daftar Pengguna</h1>

    {{-- Success or error messages --}}
    @if (session('success'))
        <div class="alert alert-success">
            {{ session('success') }}
        </div>
    @endif

    {{-- Form untuk bulk lolos administrasi, ditolak, dan diterima --}}
    <form action="{{ route('admin.user.bulkLolosAdm') }}" method="POST" id="bulk-form">
        @csrf
        @method('PUT')

        <button type="button" class="btn btn-success mb-3" onclick="submitForm('bulkLolosAdm')" >
            Loloskan Administrasi Pengguna Terpilih
        </button>
        <button type="button" class="btn btn-danger mb-3" onclick="submitForm('bulkDitolak')" >
            Tolak Pengguna Terpilih
        </button>
        <button type="button" class="btn btn-primary mb-3" onclick="submitForm('bulkDiterima')" >
            Terima Pengguna Terpilih
        </button>

        {{-- User table --}}
        <table class="table table-bordered table-striped">
            <thead>
                <tr>
                    <th><input type="checkbox" id="select-all"></th>
                    <th>#</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>NISN</th>
                    <th>Jalur Pendaftaran</th>
                    <th>Status</th>
                    <th>Aksi</th>
                </tr>
            </thead>
            <tbody>
                @forelse($user as $index => $u)
                    <tr>
                        <td><input type="checkbox" name="selected_users[]" value="{{ $u->id }}"></td>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $u->name }}</td>
                        <td>{{ $u->email }}</td>
                        <td>{{ $u->nisn }}</td>
                        <td>{{ $u->jalur->nama_jalur ?? 'Belum memilih jalur' }}</td>
                        <td>{{ $u->status ?? 'Status belum ditentukan' }}</td>
                        <td>
                            <a href="{{ route('admin.user.show', $u->id) }}" class="btn btn-info btn-sm">Detail</a>
                            <form action="{{ route('admin.user.lolosAdm', $u->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin meloloskan administrasi pengguna ini?')">Lolos Administrasi</button>
                            </form>
                            <form action="{{ route('admin.user.diterima', $u->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menerima  pengguna ini?')">Terima</button>
                            </form>
                            <form action="{{ route('admin.user.ditolak', $u->id) }}" method="POST" style="display:inline;">
                                @csrf
                                @method('PUT')
                                <button type="submit" class="btn btn-danger btn-sm" onclick="return confirm('Yakin ingin menolak pengguna ini?')">Tolak</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr>
                        <td colspan="8" class="text-center">Tidak ada data pengguna.</td>
                    </tr>
                @endforelse
            </tbody>
        </table>
    </form>
</div>

{{-- Script untuk Select All checkbox dan form submission --}}
<script>
    document.getElementById('select-all').addEventListener('change', function () {
        const checkboxes = document.querySelectorAll('input[name="selected_users[]"]');
        checkboxes.forEach(checkbox => checkbox.checked = this.checked);
    });

    function submitForm(action) {
        const form = document.getElementById('bulk-form');
        form.action = "{{ url('/admin/user/') }}/" + action;
        form.submit();
    }
</script>
