import { router } from '@inertiajs/react';
import React from 'react';

const User = ({ user }) => {
    console.log(user);

    // Function to get the photo URL
    const getPhotoUrl = (filename) => {
        if (!filename) return null;
        return `/storage/${filename}`;
    };

    function editUser(){
        router.get(route('user.edit'));
    }

    return (
        <div className="container mx-auto p-4">
            <table className="min-w-full bg-white shadow-md rounded-lg overflow-hidden">
                <thead className="bg-gray-100">
                    <tr>
                        <th className="px-4 py-2">Foto</th>
                        <th className="px-4 py-2">ID</th>
                        <th className="px-4 py-2">Nama</th>
                        <th className="px-4 py-2">Email</th>
                        <th className="px-4 py-2">NISN</th>
                        <th className="px-4 py-2">Agama</th>
                        <th className="px-4 py-2">Alamat</th>
                        <th className="px-4 py-2">Tanggal Lahir</th>
                        <th className="px-4 py-2">Tempat Lahir</th>
                        <th className="px-4 py-2">Gender</th>
                        <th className="px-4 py-2">HP</th>
                        <th className="px-4 py-2">Sekolah</th>
                        <th className="px-4 py-2">Status</th>
                        <th className="px-4 py-2">Nama Ayah</th>
                        <th className="px-4 py-2">Nama Ibu</th>
                        <th className="px-4 py-2">Tgl Lahir Ayah</th>
                        <th className="px-4 py-2">Tgl Lahir Ibu</th>
                        <th className="px-4 py-2">HP Ayah</th>
                        <th className="px-4 py-2">HP Ibu</th>
                        <th className="px-4 py-2">Pendidikan Ayah</th>
                        <th className="px-4 py-2">Pendidikan Ibu</th>
                        <th className="px-4 py-2">Pendapatan Ayah</th>
                        <th className="px-4 py-2">Pendapatan Ibu</th>
                        <th className="px-4 py-2">Action</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td className="border px-4 py-2">
                            {user.foto ? (
                                <img
                                    src={getPhotoUrl(user.foto)}
                                    alt={`Foto ${user.name}`}
                                    className="w-20 h-20 object-cover rounded-full"
                                />
                            ) : (
                                <div className="w-20 h-20 bg-gray-200 rounded-full flex items-center justify-center">
                                    <span className="text-gray-500">No Photo</span>
                                </div>
                            )}
                        </td>
                        <td className="border px-4 py-2">{user.id}</td>
                        <td className="border px-4 py-2">{user.name}</td>
                        <td className="border px-4 py-2">{user.email}</td>
                        <td className="border px-4 py-2">{user.nisn}</td>
                        <td className="border px-4 py-2">{user.agama}</td>
                        <td className="border px-4 py-2">{user.alamat}</td>
                        <td className="border px-4 py-2">{user.tgl_lahir}</td>
                        <td className="border px-4 py-2">{user.tempat_lahir}</td>
                        <td className="border px-4 py-2">{user.gender === 1 ? 'Male' : 'Female'}</td>
                        <td className="border px-4 py-2">{user.hp}</td>
                        <td className="border px-4 py-2">{user.sekolah}</td>
                        <td className="border px-4 py-2">{user.status}</td>
                        <td className="border px-4 py-2">{user.nama_ayah}</td>
                        <td className="border px-4 py-2">{user.nama_ibu}</td>
                        <td className="border px-4 py-2">{user.tgl_lahir_ayah}</td>
                        <td className="border px-4 py-2">{user.tgl_lahir_ibu}</td>
                        <td className="border px-4 py-2">{user.hp_ayah}</td>
                        <td className="border px-4 py-2">{user.hp_ibu}</td>
                        <td className="border px-4 py-2">{user.pendidikan_ayah}</td>
                        <td className="border px-4 py-2">{user.pendidikan_ibu}</td>
                        <td className="border px-4 py-2">{user.pendapatan_ayah}</td>
                        <td className="border px-4 py-2">{user.pendapatan_ibu}</td>
                        <td className="border px-4 py-2">
                            <button onClick={editUser}>Edit</button>
                        </td>
                    </tr>
                </tbody>
            </table>
        </div>
    );
};

export default User;
