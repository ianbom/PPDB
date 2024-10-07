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

      <table className="min-w-full bg-white border border-gray-300 rounded-lg overflow-hidden">
        <thead>
          <tr className="bg-gray-100">
            <th className="p-3">
              <input
                type="checkbox"
                onChange={handleSelectAll}
              />
            </th>
            <th className="p-3">#</th>
            <th className="p-3">Nama</th>
            <th className="p-3">Email</th>
            <th className="p-3">NISN</th>
            <th className="p-3">Jalur Pendaftaran</th>
            <th className="p-3">Status</th>
            <th className="p-3">Aksi</th>
          </tr>
        </thead>
        <tbody>
          {users.length > 0 ? (
            users.map((user, index) => (
              <tr key={user.id} className="border-b">
                <td className="p-3">
                  <input
                    type="checkbox"
                    checked={selectedUsers.includes(user.id)}
                    onChange={() => handleSelectUser(user.id)}
                  />
                </td>
                <td className="p-3">{index + 1}</td>
                <td className="p-3">{user.name}</td>
                <td className="p-3">{user.email}</td>
                <td className="p-3">{user.nisn}</td>
                <td className="p-3">{user.jalur?.nama_jalur || 'Belum memilih jalur'}</td>
                <td className="p-3">{user.status || 'Status belum ditentukan'}</td>
                <td className="p-3 flex space-x-2">
                  <a
                    href={`/admin/user/${user.id}`}
                    className="bg-blue-400 text-white px-2 py-1 rounded hover:bg-blue-500"
                  >
                    Detail
                  </a>
                  <button
                    className="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600"
                    onClick={() => console.log(`Lolos Administrasi ${user.id}`)}
                  >
                    Lolos Administrasi
                  </button>
                  <button
                    className="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600"
                    onClick={() => console.log(`Terima ${user.id}`)}
                  >
                    Terima
                  </button>
                  <button
                    className="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600"
                    onClick={() => console.log(`Tolak ${user.id}`)}
                  >
                    Tolak
                  </button>
                </td>
              </tr>
            ))
          ) : (
            <tr>
              <td colSpan="8" className="text-center p-3">Tidak ada data pengguna.</td>
            </tr>
          )}
        </tbody>
      </table>
    </div>
  );
};

export default UserList;


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
