<?php

namespace App\Http\Controllers;

use App\Models\Jalur;
use Illuminate\Http\Request;

class JalurController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $jalur = Jalur::all();

       // return response()->json(['jalur' => $jalur]);
        return view('admin.jalur.index_jalur', ['jalur' => $jalur])->with('sukses');
    }

    public function create()
    {
        return view('admin.jalur.create_jalur');
    }

    public function store(Request $request)
    {
        $request->validate([
            'nama_jalur' => 'required|string',
            'biaya' => 'required|numeric|min:0',
            'deskripsi' => 'required|string'
        ]);

        Jalur::create([
            'nama_jalur' => $request->nama_jalur,
            'biaya' => $request->biaya,
            'deskripsi' => $request->deskripsi,
        ]);

        return redirect()->back()->with('Sukses create jalur');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit( $id)
    {
        $jalur = Jalur::findOrFail($id);

        return view('admin.jalur.edit_jalur', ['jalur' => $jalur]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request,  $id)
    {
        $jalur = Jalur::findOrFail($id);
        $request->validate([
            'nama_jalur' => 'required|string',
            'biaya' => 'required|decimal',
            'deskripsi' => 'required|string'
        ]);

        $jalur->update($request->all());
        $jalur->save();

        return redirect()->back()->with('Sukses update jalur');


    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
