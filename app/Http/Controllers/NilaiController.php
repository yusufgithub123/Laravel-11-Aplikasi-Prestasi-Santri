<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kriteria;
use App\Models\Alternatif;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NilaiController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $penilaian = Nilai::getList();
        $detail = Nilai::getNilai();
        return view('admin.nilai.index', compact('penilaian', 'detail'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $alternatifs = Alternatif::doesntHave('nilai')->get();
        $kriteria = Kriteria::all();
        return view('admin.nilai.create', compact('alternatifs', 'kriteria'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'id_alternatif' => 'required|exists:alternatif,id',
            'id_kriteria'   => 'required|exists:kriteria,id',
            'nilai'   => 'required',
        ]);
        
        $idAlternatif = $request->id_alternatif;
        $idKriterias = $request->id_kriteria;
        $nilais = $request->nilai;

        foreach ($idKriterias as $key => $idKriteria) {
            Nilai::create([
                'id_alternatif' => $idAlternatif,
                'id_kriteria'   => $idKriteria,
                'nilai'         => $nilais[$key],
            ]);
        }

        return redirect()->route('nilai.index')->with('success', 'Nilai berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = Nilai::getAllData($id);
        $alternatif = Alternatif::findOrFail($id);

        return view('admin.nilai.show', compact('data', 'alternatif'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $nilais = DB::select('SELECT * FROM nilai WHERE id_alternatif = ?', [$id]);
        $alternatif = Alternatif::findOrFail($id);
        $kriteria = Kriteria::all();

        return view('admin.nilai.edit', compact('nilais', 'kriteria', 'alternatif'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        // Validasi data yang diterima
    $request->validate([
        'id_kriteria' => 'required|array', // Memastikan id_kriteria adalah array
        'nilai'       => 'required|array', // Memastikan nilai adalah array
        'id_alternatif' => 'required|exists:alternatif,id', // Validasi id_alternatif
    ]);

    // Temukan alternatif berdasarkan ID
    $alternatif = Alternatif::findOrFail($id);

    // Ambil data dari request
    $idKriteria = $request->id_kriteria; // Ini harus berupa array
    $nilai = $request->nilai; // Ini harus berupa array

    // Pastikan id_kriteria dan nilai adalah array
    if (is_array($idKriteria) && is_array($nilai)) {
        foreach ($idKriteria as $index => $kriteriaId) {
            // Pastikan index yang ada dalam idKriteria juga ada dalam array nilai
            if (array_key_exists($index, $nilai)) {
                $nilaiValue = $nilai[$index];

                // Update atau buat nilai baru
                DB::table('nilai')
                    ->updateOrInsert(
                        ['id_alternatif' => $alternatif->id, 'id_kriteria' => $kriteriaId],
                        ['nilai' => $nilaiValue]
                    );
            } else {
                // Tangani kasus di mana index tidak ada dalam array nilai
                // Misalnya, Anda bisa menampilkan pesan error atau log
                // Untuk debugging
                dd("Index {$index} tidak ditemukan dalam array nilai.");
            }
        }
    } else {
        // Tangani kasus jika id_kriteria atau nilai bukan array
        dd("Data id_kriteria atau nilai tidak valid.");
    }

    // Redirect ke halaman index dengan pesan sukses
    return redirect()->route('nilai.index')->with('success', 'Data Berhasil Diubah!');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        {
            // Hapus semua nilai yang terkait dengan ID alternatif
            DB::table('nilai')->where('id_alternatif', $id)->delete();
            DB::table('normalisasi')->where('id_alternatif', $id)->delete();
            DB::table('terbobot')->where('id_alternatif', $id)->delete();
            DB::table('rank')->where('id_alternatif', $id)->delete();
        
            // Redirect ke halaman index dengan pesan sukses
            return redirect()->route('nilai.index')->with('success', 'Data berhasil dihapus!');
        }
    }
}
