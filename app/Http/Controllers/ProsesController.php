<?php

namespace App\Http\Controllers;

use App\Models\Nilai;
use App\Models\Kriteria;
use App\Http\Controllers\NormalisasiController;
use App\Http\Controllers\TerbobotController;
use App\Http\Controllers\RankingController;
use Illuminate\Http\Request;

class ProsesController extends Controller
{
    public function index()
    {
        $this->generate();
        $nilai = new Nilai();
        $kriteria = Kriteria::all();
        $nilaiheader = $nilai->getList();
        $nilaidetail = $nilai->getNilai();
        $ternormalisasi = new NormalisasiController();
        $headermatrik = $ternormalisasi->getalldatadisticnt();
        $detailmatrik = $ternormalisasi->getalldata();
        $referensi = new TerbobotController();
        $headerreferensi = $referensi->getalldatadisticnt();
        $detailreferensi = $referensi->getalldata();
        
        return view('admin.perhitungan.index',compact('kriteria', 'nilaiheader', 'nilaidetail', "headermatrik","detailmatrik","headerreferensi","detailreferensi"));
    }

    public function generate()
    {
        $penilaian = new Nilai();
        $ternormalisasi = new NormalisasiController();
        $referensi = new TerbobotController();

        $penilaianlist = $penilaian->getList();
        foreach ($penilaianlist as $item ) {
            $deleternormalisasi = $ternormalisasi->deletedata( $item->id_alternatif);
            $deletereferensi = $referensi->deletedata( $item->id_alternatif);

            $penilaiandetail = $penilaian->getPenilaian($item->id_alternatif);
            
            foreach ($penilaiandetail as $detail ) {
                $bobotternormalisasi = $ternormalisasi->getbobot($item->id_alternatif,$detail->id_kriteria);
                $simpanternormalisasi = $ternormalisasi->savingdata( $item->id_alternatif,
                $detail->id_kriteria, $bobotternormalisasi);
            
                $bobotreferensi = $referensi->getbobot($item->id_alternatif,$detail->id_kriteria);
                $simpanreferensi = $referensi->savingdata($item->id_alternatif,
                $detail->id_kriteria, round($bobotreferensi, 2));
            }
        }       
    }
}
