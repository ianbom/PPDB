import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
// import { FaSearch } from 'react-icons/fa'; // Importing the search icon

const Users = ({ users, success }) => {
    const [selectedUsers, setSelectedUsers] = useState([]);
    const [searchTerm, setSearchTerm] = useState('');

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

    const filteredUsers = users.filter(user =>
        user.name.toLowerCase().includes(searchTerm.toLowerCase()) ||
        user.email.toLowerCase().includes(searchTerm.toLowerCase()) ||
        user.nisn.includes(searchTerm)
    );

    return (
        <div className="container mx-auto p-6 min-h-screen" style={{ background: "url('/path/to/your/background.jpg')", backgroundSize: 'cover' }}>
            <div className="bg-[#1A4CB3] rounded-[32px] shadow-lg p-6 mb-10">
                <h1 className="text-3xl font-bold text-white text-center">Daftar Pengguna</h1>
            </div>

            {success && (
                <div className="bg-green-500 text-white p-4 rounded-lg mb-4 shadow-lg">
                    {success}
                </div>
            )}

            {/* Action Buttons */}
            <div className="mb-6 flex justify-center space-x-4">
                <button
                    className="bg-gradient-to-r from-blue-500 to-blue-700 text-white px-6 py-3 rounded-lg shadow-md hover:from-blue-600 hover:to-blue-800 transition duration-200 transform hover:scale-105"
                    onClick={() => handleBulkAction('bulkLolosAdm')}
                >
                    Loloskan Administrasi Pengguna Terpilih
                </button>
                <button
                    className="bg-gradient-to-r from-red-500 to-red-700 text-white px-6 py-3 rounded-lg shadow-md hover:from-red-600 hover:to-red-800 transition duration-200 transform hover:scale-105"
                    onClick={() => handleBulkAction('bulkDitolak')}
                >
                    Tolak Pengguna Terpilih
                </button>
                <button
                    className="bg-gradient-to-r from-green-500 to-green-700 text-white px-6 py-3 rounded-lg shadow-md hover:from-green-600 hover:to-green-800 transition duration-200 transform hover:scale-105"
                    onClick={() => handleBulkAction('bulkDiterima')}
                >
                    Terima Pengguna Terpilih
                </button>
            </div>

            {/* Search Bar */}
            {/* <div className="mb-2 mt-4 flex justify-end">
                <div className="relative w-full max-w-xs">
                    <FaSearch className="absolute left-3 top-2 text-gray-500" />
                    <input
                        type="text"
                        placeholder="Cari pengguna..."
                        className="border border-gray-500 rounded-lg pl-10 pr-4 py-1 w-full shadow-lg focus:outline-none focus:ring-2 focus:ring-[#1A4CB3]"
                        value={searchTerm}
                        onChange={(e) => setSearchTerm(e.target.value)}
                    />
                </div>
            </div> */}

            {/* Daftar Pengguna Card */}
            <div className="bg-white rounded-[12px] shadow-lg p-5">
                <div className="overflow-x-auto"> {/* Scrollable container for responsiveness */}
                    <table className="min-w-full border-collapse">
                        <thead className="bg-[#1A4CB3] text-white">
                            <tr>
                                <th className="p-3">
                                    <input
                                        type="checkbox"
                                        onChange={handleSelectAll}
                                        checked={selectedUsers.length === users.length}
                                    />
                                </th>
                                <th className="p-3 border-b">#</th>
                                <th className="p-3 border-b">Nama</th>
                                <th className="p-3 border-b">Email</th>
                                <th className="p-3 border-b">NISN</th>
                                <th className="p-3 border-b">Jalur Pendaftaran</th>
                                <th className="p-3 border-b">Status</th>
                                <th className="p-3 border-b">Aksi</th>
                            </tr>
                        </thead>
                        <tbody>
                            {filteredUsers.length > 0 ? filteredUsers.map((user, index) => (
                                <tr key={user.id} className="border-b hover:bg-gray-50">
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
                                    <td className="p-2 border-b flex space-x-2">
                                        <a href={`/admin/user/show/${user.id}`} className="bg-yellow-500 text-white px-2 py-1 rounded hover:bg-yellow-600 transition duration-200">Detail</a>
                                        <button
                                            className="bg-blue-500 text-white px-2 py-1 rounded hover:bg-blue-600 transition duration-200"
                                            onClick={() => {
                                                if (confirm('Yakin ingin meloloskan administrasi pengguna ini?')) {
                                                    Inertia.put(`/admin/user/lolosAdm/${user.id}`);
                                                }
                                            }}
                                        >
                                            Lolos Administrasi
                                        </button>
                                        <button
                                            className="bg-green-500 text-white px-2 py-1 rounded hover:bg-green-600 transition duration-200"
                                            onClick={() => {
                                                if (confirm('Yakin ingin menerima pengguna ini?')) {
                                                    Inertia.put(`/admin/user/diterima/${user.id}`);
                                                }
                                            }}
                                        >
                                            Terima
                                        </button>
                                        <button
                                            className="bg-red-500 text-white px-2 py-1 rounded hover:bg-red-600 transition duration-200"
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
            </div>
        </div>
    );
};

export default Users;
