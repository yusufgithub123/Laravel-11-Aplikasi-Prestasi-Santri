<?php

namespace App\Http\Controllers;

use App\Models\Normalisasi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class NormalisasiController extends Controller
{
   
    public  function getbobot($id_alternatif,$id_kriteria)
    {
    $data = Normalisasi::getbobot($id_alternatif, $id_kriteria);


    // Ambil atribut dari kriteria
    // $kriteria = DB::table('kriterias')->where('kode', $id_kriteria)->first();
    // $dataArray = DB::table('Normalisasi')
    // ->where('id_kriteria', $id_kriteria)
    // ->pluck('bobot')
    // ->toArray();

    // $min = min($dataArray);
    // if ($kriteria->atribut == 'Benefit') {
    //     return $data; // Nilai untuk Benefit tetap
    // } elseif ($kriteria->atribut == 'Cost') {
    //     return $min / $data; // Nilai untuk Cost dibalik
    // }

    return $data;
    }
 
    public  function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
        $data = Normalisasi::savingdata($id_alternatif, $id_kriteria, $bobot);
        return $data;
 
    
    }
    public  function deletedata($id_alternatif)
    {
        $data = Normalisasi::deletedata($id_alternatif);
        return $data;
    
    
    }

    public  function getalldata()
    {
        $data = Normalisasi::getalldata();
        return $data;

    
    }
    public  function getalldatadisticnt()
    {
        $data = Normalisasi::getalldatadisticnt();
        return $data;

    
    }
}
