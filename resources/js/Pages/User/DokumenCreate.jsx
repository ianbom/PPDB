import React, { useState } from 'react';
import { useForm } from '@inertiajs/react';

const DokumenCreate = () => {
  const { data, setData, post, errors } = useForm({
    kk: null,
    ijazah: null,
    raport: null,
    tambahan: null,
  });

  // State untuk menyimpan nama file yang dipilih
  const [fileNames, setFileNames] = useState({
    kk: 'Tidak Ada File Dipilih',
    ijazah: 'Tidak Ada File Dipilih',
    raport: 'Tidak Ada File Dipilih',
    tambahan: 'Tidak Ada File Dipilih',
  });

  const handleFileChange = (e, fieldName) => {
    const file = e.target.files[0];
    setFileNames((prev) => ({
      ...prev,
      [fieldName]: file ? file.name : 'Tidak Ada File Dipilih',
    }));
    setData(fieldName, file);
  };

  const handleSubmit = (e) => {
    e.preventDefault();
    post(route('dokumen.store'));
  };

  return (
    <div
      className="min-h-screen bg-cover bg-center flex items-center justify-center"
      style={{
        backgroundImage: "url('/images/background.png')",
        opacity: 0.9,
      }}
    >
      <div className="bg-white p-8 rounded-lg shadow-lg max-w-4xl w-full relative">
        {/* Header */}
        <h1 className="text-3xl font-semibold text-gray-800 mb-2">Berkas Siswa</h1>
        <p className="text-gray-500 mb-6">Lengkapi Berkas yang dibutuhkan dibawah ini</p>
        <div className="w-full h-1 bg-blue-600 mb-6"></div>

        {/* Form */}
        <form onSubmit={handleSubmit}>
          <div className="grid grid-cols-1 md:grid-cols-2 gap-6">

            {/* Identitas Diri */}
            <div className="flex flex-col">
              <label htmlFor="kk" className="font-medium text-gray-700 mb-1">Identitas Diri</label>
              <div className="flex items-center rounded-lg border" style={{ borderColor: '#1A4CB3' }}>
                <label className="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                  Pilih File
                  <input
                    type="file"
                    id="kk"
                    className="hidden"
                    onChange={(e) => handleFileChange(e, 'kk')}
                  />
                </label>
                <span className="text-gray-500">{fileNames.kk}</span>
              </div>
              {errors.kk && <span className="text-red-500">{errors.kk}</span>}
            </div>

            {/* Ijazah SMP */}
            <div className="flex flex-col">
              <label htmlFor="ijazah" className="font-medium text-gray-700 mb-1">Ijazah SMP</label>
              <div className="flex items-center">
                <label className="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                  Pilih File
                  <input
                    type="file"
                    id="ijazah"
                    className="hidden"
                    onChange={(e) => handleFileChange(e, 'ijazah')}
                  />
                </label>
                <span className="text-gray-500">{fileNames.ijazah}</span>
              </div>
              {errors.ijazah && <span className="text-red-500">{errors.ijazah}</span>}
            </div>

            {/* Sertifikat Lomba */}
            <div className="flex flex-col">
              <label htmlFor="raport" className="font-medium text-gray-700 mb-1">Sertifikat Lomba</label>
              <div className="flex items-center">
                <label className="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                  Pilih File
                  <input
                    type="file"
                    id="raport"
                    className="hidden"
                    onChange={(e) => handleFileChange(e, 'raport')}
                  />
                </label>
                <span className="text-gray-500">{fileNames.raport}</span>
              </div>
              {errors.raport && <span className="text-red-500">{errors.raport}</span>}
            </div>

            {/* Tambahan */}
            <div className="flex flex-col">
              <label htmlFor="tambahan" className="font-medium text-gray-700 mb-1">Tambahan</label>
              <div className="flex items-center">
                <label className="bg-blue-500 text-white font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                  Pilih File
                  <input
                    type="file"
                    id="tambahan"
                    className="hidden"
                    onChange={(e) => handleFileChange(e, 'tambahan')}
                  />
                </label>
                <span className="text-gray-500">{fileNames.tambahan}</span>
              </div>
              {errors.tambahan && <span className="text-red-500">{errors.tambahan}</span>}
            </div>
          </div>

          {/* Submit Button */}
          <div className="flex justify-end mt-6">
            <button
              type="submit"
              className="bg-blue-600 text-white font-bold py-2 px-6 rounded-lg hover:bg-blue-700"
            >
              Simpan
            </button>
          </div>
        </form>
      </div>
    </div>
  );
};

export default DokumenCreate;
