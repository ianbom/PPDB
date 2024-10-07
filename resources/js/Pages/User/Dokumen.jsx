import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faUpload } from '@fortawesome/free-solid-svg-icons';

const Dokumen = ({ kk, ijazah, raport, tambahan }) => {
  const [selectedFileKK, setSelectedFileKK] = useState('');
  const [selectedFileIjazah, setSelectedFileIjazah] = useState('');
  const [selectedFileRaport, setSelectedFileRaport] = useState('');
  const [selectedFileTambahan, setSelectedFileTambahan] = useState('');

  const handleUpdate = (e, updateRoute) => {
    e.preventDefault();
    const formData = new FormData(e.target);
    Inertia.post(updateRoute, formData, {
      onSuccess: () => {
        alert('Dokumen berhasil diperbarui!');
      },
      onError: (errors) => {
        alert('Gagal memperbarui dokumen: ' + errors.file);
        console.log(errors);
      },
    });
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
        <h6 className="text-[#1A4CB3] mb-2 text-sm font-bold">Dokumen Anda</h6>
        <h1 className="text-3xl font-semibold text-gray-800 mb-2">Berkas Anda</h1>
        <p className="text-gray-500 mb-6">Berikut adalah dokumen yang telah Anda unggah.</p>
        <div className="w-full h-2 bg-[#1A4CB3] rounded-lg mb-6"></div>

        <div className="grid grid-cols-1 md:grid-cols-2 gap-6">
          {/* Kartu Keluarga (KK) */}
          <div className="flex flex-col">
            <h3 className="font-medium text-gray-700 mb-1">Kartu Keluarga (KK)</h3>
            {kk ? (
              <div className="flex items-center space-x-4">
                <a
                  href={`/storage/${kk.file}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg text-center"
                >
                  Lihat KK
                </a>
                <form onSubmit={(e) => handleUpdate(e, route('dokumen.updateKK'))} encType="multipart/form-data" className="flex items-center">
                  <div className="flex items-center rounded-lg border" style={{ borderColor: '#1A4CB3' }}>
                    <label className="bg-[#E8EDF7] text-[#1A4CB3] font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                      File Baru
                      <input
                        type="file"
                        name="kk"
                        className="hidden"
                        required
                        onChange={(e) => {
                          setSelectedFileKK(e.target.files[0]?.name || '');
                        }}
                      />
                    </label>
                    {selectedFileKK && <p className="mt-2 text-gray-600">File yang dipilih: {selectedFileKK}</p>}
                  </div>
                  <button type="submit" className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg flex items-center justify-center mt-2 space-x-2">
                    <FontAwesomeIcon icon={faUpload} />
                    <span>Update</span>
                  </button>
                </form>
              </div>
            ) : (
              <p>Belum ada dokumen KK.</p>
            )}
          </div>

          {/* Ijazah */}
          <div className="flex flex-col">
            <h3 className="font-medium text-gray-700 mb-1">Ijazah</h3>
            {ijazah ? (
              <div className="flex items-center space-x-4">
                <a
                  href={`/storage/${ijazah.file}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg text-center"
                >
                  Lihat Ijazah
                </a>
                <form onSubmit={(e) => handleUpdate(e, route('dokumen.updateIjazah'))} encType="multipart/form-data" className="flex items-center">
                  <div className="flex items-center rounded-lg border" style={{ borderColor: '#1A4CB3' }}>
                    <label className="bg-[#E8EDF7] text-[#1A4CB3] font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                      File Baru
                      <input
                        type="file"
                        name="ijazah"
                        className="hidden"
                        required
                        onChange={(e) => {
                          setSelectedFileIjazah(e.target.files[0]?.name || '');
                        }}
                      />
                    </label>
                    {selectedFileIjazah && <p className="mt-2 text-gray-600">File yang dipilih: {selectedFileIjazah}</p>}
                  </div>
                  <button type="submit" className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg flex items-center justify-center mt-2 space-x-2">
                    <FontAwesomeIcon icon={faUpload} />
                    <span>Update</span>
                  </button>
                </form>
              </div>
            ) : (
              <p>Belum ada dokumen Ijazah.</p>
            )}
          </div>

          {/* Raport */}
          <div className="flex flex-col">
            <h3 className="font-medium text-gray-700 mb-1">Raport</h3>
            {raport ? (
              <div className="flex items-center space-x-4">
                <a
                  href={`/storage/${raport.file}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg text-center"
                >
                  Lihat Raport
                </a>
                <form onSubmit={(e) => handleUpdate(e, route('dokumen.updateRaport'))} encType="multipart/form-data" className="flex items-center">
                  <div className="flex items-center rounded-lg border" style={{ borderColor: '#1A4CB3' }}>
                    <label className="bg-[#E8EDF7] text-[#1A4CB3] font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                      File Baru
                      <input
                        type="file"
                        name="raport"
                        className="hidden"
                        required
                        onChange={(e) => {
                          setSelectedFileRaport(e.target.files[0]?.name || '');
                        }}
                      />
                    </label>
                    {selectedFileRaport && <p className="mt-2 text-gray-600">File yang dipilih: {selectedFileRaport}</p>}
                  </div>
                  <button type="submit" className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg flex items-center justify-center mt-2 space-x-2">
                    <FontAwesomeIcon icon={faUpload} />
                    <span>Update</span>
                  </button>
                </form>
              </div>
            ) : (
              <p>Belum ada dokumen Raport.</p>
            )}
          </div>

          {/* Dokumen Tambahan */}
          <div className="flex flex-col">
            <h3 className="font-medium text-gray-700 mb-1">Dokumen Tambahan</h3>
            {tambahan ? (
              <div className="flex items-center space-x-4">
                <a
                  href={`/storage/${tambahan.file}`}
                  target="_blank"
                  rel="noopener noreferrer"
                  className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg text-center"
                >
                  Lihat Dokumen
                </a>
                <form onSubmit={(e) => handleUpdate(e, route('dokumen.updateTambahan'))} encType="multipart/form-data" className="flex items-center">
                  <div className="flex items-center rounded-lg border" style={{ borderColor: '#1A4CB3' }}>
                    <label className="bg-[#E8EDF7] text-[#1A4CB3] font-semibold py-2 px-4 rounded-lg cursor-pointer mr-2">
                      File Baru
                      <input
                        type="file"
                        name="tambahan"
                        className="hidden"
                        required
                        onChange={(e) => {
                          setSelectedFileTambahan(e.target.files[0]?.name || '');
                        }}
                      />
                    </label>
                    {selectedFileTambahan && <p className="mt-2 text-gray-600">File yang dipilih: {selectedFileTambahan}</p>}
                  </div>
                  <button type="submit" className="bg-[#1A4CB3] text-white py-2 px-4 rounded-lg flex items-center justify-center mt-2 space-x-2">
                    <FontAwesomeIcon icon={faUpload} />
                    <span>Update</span>
                  </button>
                </form>
              </div>
            ) : (
              <p>Belum ada dokumen Tambahan.</p>
            )}
          </div>
        </div>
      </div>
    </div>
  );
};

export default Dokumen;
