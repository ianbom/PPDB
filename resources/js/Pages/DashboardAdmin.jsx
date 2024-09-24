
import React, { useState } from 'react';
import { Inertia, Head } from '@inertiajs/inertia';

const Users = ({ users, success }) => {
    const [selectedUsers, setSelectedUsers] = useState([]);

    const handleSelectAll = (e) => {
        if (e.target.checked) {
            setSelectedUsers(users.map(user => user.id));
        } else {
            setSelectedUsers([]);
        }
    };

    const handleSelectUser = (userId) => {
        if (selectedUsers.includes(userId)) {
            setSelectedUsers(selectedUsers.filter(id => id !== userId));
        } else {
            setSelectedUsers([...selectedUsers, userId]);
        }
    };

    const handleBulkAction = (action) => {
        Inertia.put(`/admin/user/${action}`, { selected_users: selectedUsers });
    };

    return (

        <div className="container mx-auto">
            <h1 className="mb-4 text-2xl font-bold">Daftar Pengguna</h1>

            {success && (
                <div className="alert alert-success">
                    {success}
                </div>
            )}

            <div className="mb-4">
                <button
                    className="btn btn-success mr-2"
                    onClick={() => handleBulkAction('bulkLolosAdm')}
                >
                    Loloskan Administrasi Pengguna Terpilih
                </button>
                <button
                    className="btn btn-danger mr-2"
                    onClick={() => handleBulkAction('bulkDitolak')}
                >
                    Tolak Pengguna Terpilih
                </button>
                <button
                    className="btn btn-primary"
                    onClick={() => handleBulkAction('bulkDiterima')}
                >
                    Terima Pengguna Terpilih
                </button>
            </div>

            <table className="min-w-full bg-white border border-gray-200">
                <thead>
                    <tr>
                        <th className="p-2">
                            <input
                                type="checkbox"
                                onChange={handleSelectAll}
                                checked={selectedUsers.length === users.length}
                            />
                        </th>
                        <th className="p-2 border-b">#</th>
                        <th className="p-2 border-b">Nama</th>
                        <th className="p-2 border-b">Email</th>
                        <th className="p-2 border-b">NISN</th>
                        <th className="p-2 border-b">Jalur Pendaftaran</th>
                        <th className="p-2 border-b">Status</th>
                        <th className="p-2 border-b">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    {users.length > 0 ? users.map((user, index) => (
                        <tr key={user.id}>
                            <td className="p-2">
                                <input
                                    type="checkbox"
                                    checked={selectedUsers.includes(user.id)}
                                    onChange={() => handleSelectUser(user.id)}
                                />
                            </td>
                            <td className="p-2 border-b">{index + 1}</td>
                            <td className="p-2 border-b">{user.name}</td>
                            <td className="p-2 border-b">{user.email}</td>
                            <td className="p-2 border-b">{user.nisn}</td>
                            <td className="p-2 border-b">{user.jalur?.nama_jalur || 'Belum memilih jalur'}</td>
                            <td className="p-2 border-b">{user.status || 'Status belum ditentukan'}</td>
                            <td className="p-2 border-b">
                                <a href={`/admin/user/show/${user.id}`} className="mx-1 p-1 bg-yellow-500">Detail</a>
                                <button
                                    className="mx-1 p-1 bg-blue-500 "
                                    onClick={() => {
                                        if (confirm('Yakin ingin meloloskan administrasi pengguna ini?')) {
                                            Inertia.put(`/admin/user/lolosAdm/${user.id}`);
                                        }
                                    }}
                                >
                                    Lolos Administrasi
                                </button>
                                <button
                                    className="mx-1 p-1 bg-green-500"
                                    onClick={() => {
                                        if (confirm('Yakin ingin menerima pengguna ini?')) {
                                            Inertia.put(`/admin/user/diterima/${user.id}`);
                                        }
                                    }}
                                >
                                    Terima
                                </button>
                                <button
                                    className="mx-1 p-1 bg-red-500"
                                    onClick={() => {
                                        if (confirm('Yakin ingin menolak pengguna ini?')) {
                                            Inertia.put(`/admin/user/ditolak/${user.id}`);
                                        }
                                    }}
                                >
                                    Tolak
                                </button>
                            </td>
                        </tr>
                    )) : (
                        <tr>
                            <td colSpan="8" className="text-center p-4">Tidak ada data pengguna.</td>
                        </tr>
                    )}
                </tbody>
            </table>
        </div>
    );
};

export default Users;
