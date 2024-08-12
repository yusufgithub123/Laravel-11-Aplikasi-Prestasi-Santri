<?php

namespace App\Http\Controllers;

use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\DB;

class AlternatifController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $alternatif = Alternatif::all();
        return view('admin.alternatif.index', compact('alternatif'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('admin.alternatif.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request) : RedirectResponse
    {
        $request->validate([
            'nisn'              => 'required',
            'nama_santri'       => 'required',
            'tingkatan_kelas'   => 'required',
            'alamat'            => 'required',
            'nama_ayah'         => 'required',
            'nama_ibu'          => 'required',
            'gambar'            => 'required|image|mimes:jpeg,jpg,png|max:2048',
        ]);

        //upload image
        $image = $request->file('gambar');
        $image->storeAs('public/gambar', $image->hashName());

        //create product
        Alternatif::create([
            'nisn'              => $request->nisn,
            'nama_santri'       => $request->nama_santri,
            'tingkatan_kelas'   => $request->tingkatan_kelas,
            'alamat'            => $request->alamat,
            'nama_ayah'         => $request->nama_ayah,
            'nama_ibu'          => $request->nama_ibu,
            'gambar'            => $image->hashName(),
        ]);

        //redirect to index
        return redirect()->route('alternatif.index')->with(['success' => 'Data Berhasil Disimpan!']);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        return view('admin.alternatif.show', compact('alternatif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        return view('admin.alternatif.edit', compact('alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'nisn'              => 'required',
            'nama_santri'       => 'required',
            'tingkatan_kelas'   => 'required',
            'alamat'            => 'required',
            'nama_ayah'         => 'required',
            'nama_ibu'          => 'required',
            'gambar'            => 'image|mimes:jpeg,jpg,png|max:2048',
        ]);

        $alternatif = Alternatif::findOrFail($id);

        if ($request->hasFile('gambar')) {

            //upload new image
            $image = $request->file('gambar');
            $image->storeAs('public/gambar', $image->hashName());

            //delete old image
            Storage::delete('public/gambar/'.$alternatif->gambar);

            //update product with new image
            $alternatif->update([
                'nisn'              => $request->nisn,
                'nama_santri'       => $request->nama_santri,
                'tingkatan_kelas'   => $request->tingkatan_kelas,
                'alamat'            => $request->alamat,
                'nama_ayah'         => $request->nama_ayah,
                'nama_ibu'          => $request->nama_ibu,
                'gambar'            => $image->hashName(),
            ]);

        } else {

            //update product without image
            $alternatif->update([
                'nisn'              => $request->nisn,
                'nama_santri'       => $request->nama_santri,
                'tingkatan_kelas'   => $request->tingkatan_kelas,
                'alamat'            => $request->alamat,
                'nama_ayah'         => $request->nama_ayah,
                'nama_ibu'          => $request->nama_ibu,
            ]);
        }

        //redirect to index
        return redirect()->route('alternatif.index')->with(['success' => 'Data Berhasil Diubah!']);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $alternatif = Alternatif::findOrFail($id);

        //delete image
        Storage::delete('public/gambar/'. $alternatif->gambar);

        //delete product
        $alternatif->delete();

        // delete all related to alternatif
        DB::table('nilai')->where('id_alternatif', $id)->delete();
        DB::table('normalisasi')->where('id_alternatif', $id)->delete();
        DB::table('terbobot')->where('id_alternatif', $id)->delete();
        DB::table('rank')->where('id_alternatif', $id)->delete();

        //redirect to index
        return redirect()->route('alternatif.index')->with(['success' => 'Data Berhasil Dihapus!']);
    }
}
