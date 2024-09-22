<?php

namespace App\Http\Controllers;

use App\Models\Dokumen;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class DokumenController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $userId = Auth::id();
        $kk = Dokumen::where('id', $userId)->where('tipe_dokumen', 'kk')->first();
        $ijazah = Dokumen::where('id', $userId)->where('tipe_dokumen', 'ijazah')->first();
        $raport = Dokumen::where('id', $userId)->where('tipe_dokumen', 'raport')->first();
        $tambahan = Dokumen::where('id', $userId)->where('tipe_dokumen', 'tambahan')->first();

        return view('dokumen')
        ->with('kk', $kk)
        ->with('ijazah', $ijazah)
        ->with('raport', $raport)
        ->with('tambahan', $tambahan);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return Inertia::render('User/DokumenCreate');
    }

    public function store(Request $request)
{
    $userId = Auth::id();
    $request->validate([
        'kk' => 'nullable|file',
        'ijazah' => 'nullable|file',
        'raport' => 'nullable|file',
        'tambahan' => 'nullable|file',
    ]);

    if ($request->hasFile('kk')) {
        $kkPath = $request->file('kk')->store('dokumen/kk', 'public');
        Dokumen::create([
            'id' => $userId,
            'tipe_dokumen' => 'kk',
            'file' => $kkPath,
        ]);
    }

    if ($request->hasFile('ijazah')) {
        $ijazahPath = $request->file('ijazah')->store('dokumen/ijazah', 'public');
        Dokumen::create([
            'id' => $userId,
            'tipe_dokumen' => 'ijazah',
            'file' => $ijazahPath,
        ]);
    }

    if ($request->hasFile('raport')) {
        $raportPath = $request->file('raport')->store('dokumen/raport', 'public');
        Dokumen::create([
            'id' => $userId,
            'tipe_dokumen' => 'raport',
            'file' => $raportPath,
        ]);
    }

    if ($request->hasFile('tambahan')) {
        $tambahanPath = $request->file('tambahan')->store('dokumen/tambahan', 'public');
        Dokumen::create([
            'id' => $userId,
            'tipe_dokumen' => 'tambahan',
            'file' => $tambahanPath,
        ]);
    }

    return response()->json("sukses");
}


    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {

    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
{
    try {
        $userId = Auth::id();
        $request->validate([
            'kk' => 'nullable|file',
            'ijazah' => 'nullable|file',
            'raport' => 'nullable|file',
            'tambahan' => 'nullable|file',
        ]);

        $dokumen = Dokumen::where('user_id', $userId)->findOrFail($id);

        $fileTypes = ['kk', 'ijazah', 'raport', 'tambahan'];

        foreach ($fileTypes as $type) {
            if ($request->hasFile($type)) {
                // Delete old file if exists
                if ($dokumen->tipe_dokumen == $type && Storage::disk('public')->exists($dokumen->file)) {
                    Storage::disk('public')->delete($dokumen->file);
                }

                $path = $request->file($type)->store("dokumen/$type", 'public');
                $dokumen->file = $path;
                $dokumen->tipe_dokumen = $type;
                $dokumen->save();
            }
        }

        return response()->json(['message' => 'Dokumen berhasil diperbarui.']);
    } catch (\Exception $e) {
        return response()->json(['error' => $e->getMessage()], 500);
    }
}


public function updateKK(Request $request)
{
    $userId = Auth::id();

    try {
        $request->validate([
            'kk' => 'required|file',
        ]);

        if ($request->hasFile('kk')) {
            $kkPath = $request->file('kk')->store('dokumen/kk', 'public');

            $dokumen = Dokumen::firstOrCreate(
                ['id' => $userId, 'tipe_dokumen' => 'kk'],
                ['file' => $kkPath]
            );
            if ($dokumen->exists) {
                $dokumen->file = $kkPath;
                $dokumen->save();
            }
        }

        return redirect()->back()->with('success', 'Dokumen KK berhasil diperbarui!');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui dokumen.']);
    }
}

public function updateIjazah(Request $request)
{
    $userId = Auth::id();

    try {
        $request->validate([
            'ijazah' => 'required|file',
        ]);

        if ($request->hasFile('ijazah')) {
            $ijazahPath = $request->file('ijazah')->store('dokumen/ijazah', 'public');

            $dokumen = Dokumen::firstOrCreate(
                ['id' => $userId, 'tipe_dokumen' => 'ijazah'],
                ['file' => $ijazahPath]
            );
            if ($dokumen->exists) {
                $dokumen->file = $ijazahPath;
                $dokumen->save();
            }
        }

        return redirect()->back()->with('success', 'Dokumen Ijazah berhasil diperbarui!');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui dokumen.']);
    }
}

public function updateRaport(Request $request)
{
    $userId = Auth::id();

    try {
        $request->validate([
            'raport' => 'required|file',
        ]);

        if ($request->hasFile('raport')) {
            $raportPath = $request->file('raport')->store('dokumen/raport', 'public');

            $dokumen = Dokumen::firstOrCreate(
                ['id' => $userId, 'tipe_dokumen' => 'raport'],
                ['file' => $raportPath]
            );
            if ($dokumen->exists) {
                $dokumen->file = $raportPath;
                $dokumen->save();
            }
        }

        return redirect()->back()->with('success', 'Dokumen Raport berhasil diperbarui!');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui dokumen.']);
    }
}

public function updateTambahan(Request $request)
{
    $userId = Auth::id();

    try {
        $request->validate([
            'tambahan' => 'required|file',
        ]);

        if ($request->hasFile('tambahan')) {
            $tambahanPath = $request->file('tambahan')->store('dokumen/tambahan', 'public');

            $dokumen = Dokumen::firstOrCreate(
                ['id' => $userId, 'tipe_dokumen' => 'tambahan'],
                ['file' => $tambahanPath]
            );
            if ($dokumen->exists) {
                $dokumen->file = $tambahanPath;
                $dokumen->save();
            }
        }

        return redirect()->back()->with('success', 'Dokumen Tambahan berhasil diperbarui!');
    } catch (\Throwable $th) {
        return redirect()->back()->withErrors(['error' => 'Terjadi kesalahan saat memperbarui dokumen.']);
    }
}



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
