import React, { useState } from 'react';
import { Inertia } from '@inertiajs/inertia';

const DokumenIndex = ({ dokumen }) => {
  const [selectedFiles, setSelectedFiles] = useState({});

  const handleView = (filePath) => {
    window.open(`/storage/${filePath}`, '_blank');
  };

  const handleFileChange = (e, tipeDokumen) => {
    setSelectedFiles({
      ...selectedFiles,
      [tipeDokumen]: e.target.files[0],
    });
  };

  const handleUpdate = (e, idDokumen) => {
    e.preventDefault();

    const formData = new FormData();
    if (selectedFiles.kk) formData.append('kk', selectedFiles.kk);
    if (selectedFiles.ijazah) formData.append('ijazah', selectedFiles.ijazah);
    if (selectedFiles.raport) formData.append('raport', selectedFiles.raport);
    if (selectedFiles.tambahan) formData.append('tambahan', selectedFiles.tambahan);

    // Send the update request to the backend
    Inertia.put(route('dokumen.update', idDokumen), formData, {
      onSuccess: () => {
        alert('Dokumen berhasil diperbarui!');
      },
      onError: (errors) => {
        alert('Gagal memperbarui dokumen: ' + errors.file);
        console.log('Kenapaaaa', errors)
      },
    });
  };

  return (
    <div className="max-w-7xl mx-auto py-10 sm:px-6 lg:px-8">
      <h1 className="text-2xl font-bold mb-6">Daftar Dokumen</h1>

      {dokumen.length > 0 ? (
        <table className="min-w-full bg-white shadow-md rounded-lg">
          <thead>
            <tr>
              <th className="py-3 px-4 text-left">Tipe Dokumen</th>
              <th className="py-3 px-4 text-left">File</th>
              <th className="py-3 px-4 text-center">Aksi</th>
              <th className="py-3 px-4 text-center">Perbarui</th>
            </tr>
          </thead>
          <tbody>
            {dokumen.map((doc) => (
              <tr key={`${doc.id}-${doc.tipe_dokumen}`} className="border-t">
                <td className="py-3 px-4">{doc.tipe_dokumen}</td>
                <td className="py-3 px-4">{doc.file.split('/').pop()}</td>
                <td className="py-3 px-4 text-center">
                  <button
                    className="bg-blue-500 text-white px-4 py-2 rounded hover:bg-blue-600"
                    onClick={() => handleView(doc.file)}
                  >
                    Lihat
                  </button>
                </td>
                <td className="py-3 px-4 text-center">
                  <form onSubmit={(e) => handleUpdate(e, doc.id)}>
                    <input
                      type="file"
                      onChange={(e) => handleFileChange(e, doc.tipe_dokumen)}
                      className="mb-2"
                    />
                    <button
                      type="submit"
                      className="bg-green-500 text-white px-4 py-2 rounded hover:bg-green-600"
                    >
                      Perbarui
                    </button>
                  </form>
                </td>
              </tr>
            ))}
          </tbody>
        </table>
      ) : (
        <p className="text-gray-500">Tidak ada dokumen yang diunggah.</p>
      )}
    </div>
  );
};

export default DokumenIndex;
