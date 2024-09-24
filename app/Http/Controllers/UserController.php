<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Inertia\Inertia;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function indexAdmin()
    {
        $users = User::with('dokumen', 'jalur')->where('is_admin', false)->get();
        return Inertia::render('DashboardAdmin', ['users' => $users]);
    }

    public function showAdmin($id)
{
    $user = User::with('dokumen', 'jalur')->findOrFail($id);
    return view('admin.user_detail', ['user' => $user]);
}

    public function lolosAdm($id){
    $user = User::with('dokumen', 'jalur')->where('is_admin', false)->findOrFail($id);
    $user->status = 'lolos_administrasi';
    $user->save();

    return redirect()->back();
    }

    public function ditolak($id){
        $user = User::with('dokumen', 'jalur')->where('is_admin', false)->findOrFail($id);
        $user->status = 'ditolak';
        $user->save();

        return redirect()->back();
    }

    public function diterima($id){
        $user = User::with('dokumen', 'jalur')->where('is_admin', false)->findOrFail($id);
        $user->status = 'diterima';
        $user->save();

        return redirect()->back();
    }

    public function bulkLolosAdm(Request $request)
{
    try {
        // Validasi bahwa setidaknya ada satu pengguna yang dipilih
        $request->validate([
            'selected_users' => 'required|array',
            'selected_users.*' => 'exists:users,id',
        ]);

        // Meloloskan administrasi pengguna yang dipilih
        User::whereIn('id', $request->selected_users)
            ->where('is_admin', false) // Pastikan hanya pengguna biasa
            ->update(['status' => 'lolos_administrasi']);

        return redirect()->back()->with('success', 'Pengguna yang dipilih berhasil diloloskan administrasi.');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
    }
}

public function bulkDitolak(Request $request)
{
    try {
        // Validasi bahwa setidaknya ada satu pengguna yang dipilih
        $request->validate([
            'selected_users' => 'required|array',
            'selected_users.*' => 'exists:users,id',
        ]);

        // Update status menjadi 'ditolak' untuk pengguna yang dipilih
        User::whereIn('id', $request->selected_users)
            ->where('is_admin', false)
            ->update(['status' => 'ditolak']);

        return redirect()->back()->with('success', 'Pengguna yang dipilih berhasil ditolak.');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
    }
}

public function bulkDiterima(Request $request)
{
    try {
        // Validasi bahwa setidaknya ada satu pengguna yang dipilih
        $request->validate([
            'selected_users' => 'required|array',
            'selected_users.*' => 'exists:users,id',
        ]);

        // Update status menjadi 'diterima' untuk pengguna yang dipilih
        User::whereIn('id', $request->selected_users)
            ->where('is_admin', false)
            ->update(['status' => 'diterima']);

        return redirect()->back()->with('success', 'Pengguna yang dipilih berhasil diterima.');
    } catch (\Throwable $th) {
        return redirect()->back()->with('error', 'Terjadi kesalahan: ' . $th->getMessage());
    }
}




    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {


    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        $userId = Auth::id();
        $user = User::findOrFail($userId);

        return Inertia::render('User/User', [
            'user' => $user,
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit()
    {
        try {
            $user = Auth::user();
            $jalur = Jalur::all();

            return Inertia::render('User/UserEdit', [
                'user' => $user,
                'jalur' => $jalur,
            ]);
        } catch (\Throwable $th) {
            return response()->json(['Error' => $th]);

        }

    }

    /**
     * Update the specified resource in storage.
     */

    public function update(Request $request){

        try {
        $user = Auth::user();
        $request->validate([
            'id_jalur' => 'nullable|exists:jalur,id_jalur',
            'name' => 'required|string|max:255',
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
            'nisn' => 'nullable|string|max:255',
            'agama' => 'nullable|in:islam,kristen,katholik,hindu,budha,konghucu',
            'alamat' => 'nullable|string',
            'tgl_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'gender' => 'required|boolean',
            'hp' => 'nullable|string|max:15',
            'sekolah' => 'nullable|string|max:255',
            'status' => 'nullable|in:verifikasi_data,lolos_administrasi,diterima,ditolak',
            'is_admin' => 'nullable|boolean',
            'nama_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'nullable|string|max:255',
            'tgl_lahir_ayah' => 'nullable|date',
            'tgl_lahir_ibu' => 'nullable|date',
            'hp_ayah' => 'nullable|string|max:15',
            'hp_ibu' => 'nullable|string|max:15',
            'pendidikan_ayah' => 'nullable|in:sd,smp,sma,d1,d2,d3,d4/s1,s2,s3',
            'pendidikan_ibu' => 'nullable|in:sd,smp,sma,d1,d2,d3,d4/s1,s2,s3',
            'pendapatan_ayah' => 'nullable|numeric|min:0',
            'pendapatan_ibu' => 'nullable|numeric|min:0',
        ]);

        $user->id_jalur = $request->input('id_jalur');
        $user->name = $request->input('name');
        $user->nisn = $request->input('nisn');
        $user->agama = $request->input('agama');
        $user->alamat = $request->input('alamat');
        $user->tgl_lahir = $request->input('tgl_lahir');
        $user->tempat_lahir = $request->input('tempat_lahir');
        $user->gender = $request->input('gender');
        $user->hp = $request->input('hp');
        $user->sekolah = $request->input('sekolah');
        $user->status = $request->input('status');
        $user->is_admin = $request->input('is_admin', $user->is_admin);
        $user->nama_ayah = $request->input('nama_ayah');
        $user->nama_ibu = $request->input('nama_ibu');
        $user->tgl_lahir_ayah = $request->input('tgl_lahir_ayah');
        $user->tgl_lahir_ibu = $request->input('tgl_lahir_ibu');
        $user->hp_ayah = $request->input('hp_ayah');
        $user->hp_ibu = $request->input('hp_ibu');
        $user->pendidikan_ayah = $request->input('pendidikan_ayah');
        $user->pendidikan_ibu = $request->input('pendidikan_ibu');
        $user->pendapatan_ayah = $request->input('pendapatan_ayah');
        $user->pendapatan_ibu = $request->input('pendapatan_ibu');

        if ($request->hasFile('foto')) {
            $imagePath = $request->file('foto')->store('fotos', 'public');
        }
        $user->foto = $imagePath;

        $user->save();
        return response()->json('sukses');
        } catch (\Throwable $th) {
          return response()->json(['Error' => $th]);
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
