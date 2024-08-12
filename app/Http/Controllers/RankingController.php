<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Rank;
use App\Models\Nilai;
use App\Models\Kriteria;

class RankingController extends Controller
{
    public function index(){
        $this->generate();
        $kriteria = Kriteria::all();
        $headerranking = $this->getall();
        return view('admin.perangkingan.index', compact('kriteria', 'headerranking'));
    }

    public function generate(){
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
            
            $deleteranking = $this->deletedata( $item->id_alternatif);
            $bobotranking = $this->getbobot($item->id_alternatif);
            $simpanranking = $this->savingdata( $item->id_alternatif,
            $bobotranking);
        }
    }

    public  function getbobot($id_alternatif)
    {
        $data = Rank::getbobot($id_alternatif);
        return $data;
    }
 
    public  function savingdata($id_alternatif,$bobot)
    {
 
        $data = Rank::savingdata($id_alternatif,$bobot);
        return $data;
 
    
    }
    public  function deletedata($id_alternatif)
    {
        $data = Rank::deletedata($id_alternatif);
        return $data;
    
    
    }
    public  function getall()
    {
        $data = Rank::getall();
        return $data;
    }
 
}
