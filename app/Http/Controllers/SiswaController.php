<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;

class SiswaController extends Controller
{

    public function editProfile(){
        return view('user.update_profile');
    }

    public function updateProfile(Request $request){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        $request->validate([
            'foto' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if($request->hasFile('foto')){
            $imagePath = $request->file('foto')->store('fotos', 'public');
            if ($siswa->foto) {
               Storage::disk('public')->delete($siswa->foto);
            }
            $siswa->foto = $imagePath;
        }
        $siswa->save();
        return redirect()->back()->with(['message' => 'Sukses ubah foto']);
        //return response()->json(['siswa'=>$siswa]);
    }

    public function editDataPribadi(){
        return view('user.update_data_pribadi');
    }


    public function updateDataPribadi(Request $request){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        $request->validate([
            'name' => 'required|string|max:255',
            'nisn' => 'nullable|string|max:255',
            'agama' => 'nullable|in:islam,kristen,katholik,hindu,budha,konghucu',
            'alamat' => 'nullable|string',
            'tgl_lahir' => 'nullable|date',
            'tempat_lahir' => 'nullable|string|max:255',
            'gender' => 'required|boolean',
            'hp' => 'nullable|string|max:15',
            'sekolah' => 'nullable|string|max:255',
        ]);

        $siswa->update($request->all());
        $siswa->save();

        return redirect()->back()->with(['message' => 'Sukses ubah data pribadi']);
    }


    public function editDataAyah(){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        return view('user.update_data_ayah', ['siswa' => $siswa]);

    }

    public function updateDataAyah(Request $request){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        $request->validate([
            'nama_ayah' => 'nullable|string|max:255',
            'tgl_lahir_ayah' => 'nullable|date',
            'hp_ayah' => 'nullable|string|max:15',
            'pendidikan_ayah' => 'nullable|in:sd,smp,sma,d1,d2,d3,d4/s1,s2,s3',
            'pendapatan_ayah' => 'nullable|numeric|min:0',
        ]);

        $siswa->update($request->all());
        $siswa->save();
        return redirect()->back()->with(['message' => 'Sukses ubah data Ayah']);

    }


    public function editDataIbu(){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        return view('user.update_data_ibu', ['siswa' => $siswa]);
    }

    public function updateDataIbu(Request $request){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        $request->validate([
           'nama_ibu' => 'nullable|string|max:255',
            'tgl_lahir_ibu' => 'nullable|date',
            'hp_ibu' => 'nullable|string|max:15',
            'pendidikan_ibu' => 'nullable|in:sd,smp,sma,d1,d2,d3,d4/s1,s2,s3',
            'pendapatan_ibu' => 'nullable|numeric|min:0',
        ]);

        $siswa->update($request->all());
        $siswa->save();
        return redirect()->back()->with(['message' => 'Sukses ubah data Ibu']);

    }


    public function editDataJalur(){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);
        $jalur = Jalur::all();
        return view('user.update_data_jalur', ['siswa' => $siswa, 'jalur' => $jalur]);
    }

    public function updateDataJalur(Request $request){
        $userId = Auth::id();
        $siswa = User::findOrFail($userId);

        $request->validate([
            'id_jalur' => 'nullable|exists:jalur,id_jalur',
        ]);

        $siswa->update($request->all());
        $siswa->save();
        return redirect()->back()->with(['message' => 'Sukses ubah data jalur']);
    }

    public function indexVerifikasi(){
        $userId = Auth::id();
        $siswa = User::with('jalur')->findOrFail($userId);
        return view('user.verifikasi_data', ['siswa' => $siswa]);
    }
}
