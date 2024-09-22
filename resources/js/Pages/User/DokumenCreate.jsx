import React, { useState } from 'react';
import { useForm } from '@inertiajs/react';

const DokumenCreate = () => {
  const { data, setData, post, errors } = useForm({
    kk: null,
    ijazah: null,
    raport: null,
    tambahan: null,
  });

  const handleSubmit = (e) => {
    e.preventDefault();
    post(route('dokumen.store'));
  };

  return (
    <div className="max-w-md mx-auto bg-white p-6 rounded-lg shadow-md">
      <h1 className="text-xl font-bold mb-4">Upload Dokumen</h1>
      <form onSubmit={handleSubmit}>
        {/* KK Upload */}
        <div className="mb-4">
          <label htmlFor="kk" className="block text-gray-700 font-medium mb-2">
            Upload Kartu Keluarga (KK)
          </label>
          <input
            type="file"
            id="kk"
            onChange={(e) => setData('kk', e.target.files[0])}
            className="border border-gray-300 rounded-lg px-4 py-2 w-full"
          />
          {errors.kk && <span className="text-red-500">{errors.kk}</span>}
        </div>
     {/* Submit Button */}
     <div className="mt-6">
          <button
            type="submit"
            className="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600"
          >
            Submit
          </button>
        </div>
      </form>

      <form onSubmit={handleSubmit}>

        {/* Ijazah Upload */}
        <div className="mb-4">
          <label htmlFor="ijazah" className="block text-gray-700 font-medium mb-2">
            Upload Ijazah
          </label>
          <input
            type="file"
            id="ijazah"
            onChange={(e) => setData('ijazah', e.target.files[0])}
            className="border border-gray-300 rounded-lg px-4 py-2 w-full"
          />
          {errors.ijazah && <span className="text-red-500">{errors.ijazah}</span>}
        </div>
           {/* Submit Button */}
     <div className="mt-6">
          <button
            type="submit"
            className="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600"
          >
            Submit
          </button>
        </div>
      </form>

      <form onSubmit={handleSubmit}>

        {/* Raport Upload */}
        <div className="mb-4">
          <label htmlFor="raport" className="block text-gray-700 font-medium mb-2">
            Upload Raport
          </label>
          <input
            type="file"
            id="raport"
            onChange={(e) => setData('raport', e.target.files[0])}
            className="border border-gray-300 rounded-lg px-4 py-2 w-full"
          />
          {errors.raport && <span className="text-red-500">{errors.raport}</span>}
        </div>
        {/* Submit Button */}
     <div className="mt-6">
          <button
            type="submit"
            className="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600"
          >
            Submit
          </button>
        </div>
      </form>

      <form onSubmit={handleSubmit}>

        {/* Tambahan Upload */}
        <div className="mb-4">
          <label htmlFor="tambahan" className="block text-gray-700 font-medium mb-2">
            Upload Dokumen Tambahan
          </label>
          <input
            type="file"
            id="tambahan"
            onChange={(e) => setData('tambahan', e.target.files[0])}
            className="border border-gray-300 rounded-lg px-4 py-2 w-full"
          />
          {errors.tambahan && <span className="text-red-500">{errors.tambahan}</span>}
        </div>

        {/* Submit Button */}
     <div className="mt-6">
          <button
            type="submit"
            className="bg-blue-500 text-white font-bold py-2 px-4 rounded hover:bg-blue-600"
          >
            Submit
          </button>
        </div>
      </form>

    </div>
  );
};

export default DokumenCreate;
