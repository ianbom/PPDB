import React, { useState, useRef } from 'react';
import { router, useForm } from '@inertiajs/react';

const UserEdit = ({ user, jalur }) => {
    const [preview, setPreview] = useState(null);
    const fileInputRef = useRef();

    const { data, setData, post, processing, errors } = useForm({
        id_jalur: user.id_jalur || '',
        name: user.name || '',
        foto: user.foto || null,
        nisn: user.nisn || '',
        agama: user.agama || '',
        alamat: user.alamat || '',
        tgl_lahir: user.tgl_lahir || '',
        tempat_lahir: user.tempat_lahir || '',
        gender: user.gender !== null ? user.gender : '',
        hp: user.hp || '',
        sekolah: user.sekolah || '',
        status: user.status || '',
        is_admin: user.is_admin || false,
        nama_ayah: user.nama_ayah || '',
        nama_ibu: user.nama_ibu || '',
        tgl_lahir_ayah: user.tgl_lahir_ayah || '',
        tgl_lahir_ibu: user.tgl_lahir_ibu || '',
        hp_ayah: user.hp_ayah || '',
        hp_ibu: user.hp_ibu || '',
        pendidikan_ayah: user.pendidikan_ayah || '',
        pendidikan_ibu: user.pendidikan_ibu || '',
        pendapatan_ayah: user.pendapatan_ayah || '',
        pendapatan_ibu: user.pendapatan_ibu || '',
    });

    function handleChange(e) {
        const key = e.target.id;
        let value = e.target.type === 'checkbox' ? e.target.checked : e.target.value;

        if (e.target.type === 'file') {
            value = e.target.files[0];
            if (value) {
                const reader = new FileReader();
                reader.onloadend = () => setPreview(reader.result);
                reader.readAsDataURL(value);
            } else {
                setPreview(null);
            }
        }

        setData(key, value);
    }

    function handleSubmit(e) {
        e.preventDefault();
        router.post(route('user.update', user.id), {
            _method: 'PUT',
            ...data,
        }, {
            forceFormData: true,
        });
    }

    return (
        <div className="container mx-auto p-4">
            <h1 className="text-2xl font-bold mb-4">Edit User</h1>
            <form onSubmit={handleSubmit} className="space-y-4">
                <div>
                    <label htmlFor="id_jalur" className="block">Jalur:</label>
                    <select id="id_jalur" value={data.id_jalur} onChange={handleChange} className="w-full p-2 border rounded">
                        <option value="">Pilih Jalur</option>
                        {jalur.map(jalurs => (
                            <option key={jalurs.id_jalur} value={jalurs.id_jalur}>{jalurs.nama_jalur}</option>
                        ))}
                    </select>
                </div>

                <div>
                    <label htmlFor="name" className="block">Nama:</label>
                    <input id="name" type="text" value={data.name} onChange={handleChange} className="w-full p-2 border rounded" />
                    {errors.name && <div className="text-red-500">{errors.name}</div>}
                </div>

                <div>
                    <label htmlFor="foto" className="block">Foto:</label>
                    <input type="file" id="foto" ref={fileInputRef} onChange={handleChange} accept="image/*" className="w-full p-2 border rounded" />
                    {preview && <img src={preview} alt="Preview" className="mt-2 w-32 h-32 object-cover" />}
                </div>

                <div>
                    <label htmlFor="nisn" className="block">NISN:</label>
                    <input id="nisn" type="text" value={data.nisn} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="agama" className="block">Agama:</label>
                    <select id="agama" value={data.agama} onChange={handleChange} className="w-full p-2 border rounded">
                        <option value="">Pilih Agama</option>
                        {['islam', 'kristen', 'katholik', 'hindu', 'budha', 'konghucu'].map(agama => (
                            <option key={agama} value={agama}>{agama.charAt(0).toUpperCase() + agama.slice(1)}</option>
                        ))}
                    </select>
                </div>

                <div>
                    <label htmlFor="alamat" className="block">Alamat:</label>
                    <textarea id="alamat" value={data.alamat} onChange={handleChange} className="w-full p-2 border rounded"></textarea>
                </div>

                <div>
                    <label htmlFor="tgl_lahir" className="block">Tanggal Lahir:</label>
                    <input id="tgl_lahir" type="date" value={data.tgl_lahir} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="tempat_lahir" className="block">Tempat Lahir:</label>
                    <input id="tempat_lahir" type="text" value={data.tempat_lahir} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="gender" className="block">Jenis Kelamin:</label>
                    <select id="gender" value={data.gender} onChange={handleChange} className="w-full p-2 border rounded">
                        <option value="">Pilih Jenis Kelamin</option>
                        <option value="1">Laki-laki</option>
                        <option value="0">Perempuan</option>
                    </select>
                </div>

                <div>
                    <label htmlFor="hp" className="block">No. HP:</label>
                    <input id="hp" type="tel" value={data.hp} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="sekolah" className="block">Sekolah:</label>
                    <input id="sekolah" type="text" value={data.sekolah} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>


                <h2 className="text-xl font-bold mt-6 mb-4">Data Orang Tua</h2>

                <div>
                    <label htmlFor="nama_ayah" className="block">Nama Ayah:</label>
                    <input id="nama_ayah" type="text" value={data.nama_ayah} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="nama_ibu" className="block">Nama Ibu:</label>
                    <input id="nama_ibu" type="text" value={data.nama_ibu} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="tgl_lahir_ayah" className="block">Tanggal Lahir Ayah:</label>
                    <input id="tgl_lahir_ayah" type="date" value={data.tgl_lahir_ayah} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="tgl_lahir_ibu" className="block">Tanggal Lahir Ibu:</label>
                    <input id="tgl_lahir_ibu" type="date" value={data.tgl_lahir_ibu} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="hp_ayah" className="block">No. HP Ayah:</label>
                    <input id="hp_ayah" type="tel" value={data.hp_ayah} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="hp_ibu" className="block">No. HP Ibu:</label>
                    <input id="hp_ibu" type="tel" value={data.hp_ibu} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="pendidikan_ayah" className="block">Pendidikan Ayah:</label>
                    <select id="pendidikan_ayah" value={data.pendidikan_ayah} onChange={handleChange} className="w-full p-2 border rounded">
                        <option value="">Pilih Pendidikan</option>
                        {['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 'd4/s1', 's2', 's3'].map(edu => (
                            <option key={edu} value={edu}>{edu.toUpperCase()}</option>
                        ))}
                    </select>
                </div>

                <div>
                    <label htmlFor="pendidikan_ibu" className="block">Pendidikan Ibu:</label>
                    <select id="pendidikan_ibu" value={data.pendidikan_ibu} onChange={handleChange} className="w-full p-2 border rounded">
                        <option value="">Pilih Pendidikan</option>
                        {['sd', 'smp', 'sma', 'd1', 'd2', 'd3', 'd4/s1', 's2', 's3'].map(edu => (
                            <option key={edu} value={edu}>{edu.toUpperCase()}</option>
                        ))}
                    </select>
                </div>

                <div>
                    <label htmlFor="pendapatan_ayah" className="block">Pendapatan Ayah:</label>
                    <input id="pendapatan_ayah" type="number" value={data.pendapatan_ayah} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <div>
                    <label htmlFor="pendapatan_ibu" className="block">Pendapatan Ibu:</label>
                    <input id="pendapatan_ibu" type="number" value={data.pendapatan_ibu} onChange={handleChange} className="w-full p-2 border rounded" />
                </div>

                <button type="submit" disabled={processing} className="bg-blue-500 text-white p-2 rounded hover:bg-blue-600">
                    {processing ? 'Updating...' : 'Update'}
                </button>
            </form>
        </div>
    );
};

export default UserEdit;
