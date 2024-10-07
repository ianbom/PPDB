import React, { useState } from 'react';

const UserList = ({ users, successMessage }) => {
  const [selectedUsers, setSelectedUsers] = useState([]);

  const handleSelectAll = (event) => {
    const { checked } = event.target;
    setSelectedUsers(checked ? users.map(user => user.id) : []);
  };

  const handleSelectUser = (id) => {
    setSelectedUsers(prev =>
      prev.includes(id) ? prev.filter(userId => userId !== id) : [...prev, id]
    );
  };

  const handleBulkAction = (action) => {
    // Implement your action logic here (e.g., API call)
    console.log('Selected Users:', selectedUsers);
    console.log('Action:', action);
  };

  return (
    <div className="container mx-auto p-4">
      <h1 className="text-2xl font-bold mb-4">Daftar Pengguna</h1>

      {successMessage && (
        <div className="bg-green-200 text-green-800 p-3 mb-4 rounded">
          {successMessage}
        </div>
      )}

      <div className="flex space-x-2 mb-4">
        <button
          className="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
          onClick={() => handleBulkAction('bulkLolosAdm')}
        >
          Loloskan Administrasi Pengguna Terpilih
        </button>
        <button
          className="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600"
          onClick={() => handleBulkAction('bulkDitolak')}
        >
          Tolak Pengguna Terpilih
        </button>
        <button
          className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
          onClick={() => handleBulkAction('bulkDiterima')}
        >
          Terima Pengguna Terpilih
        </button>
      </div>

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
