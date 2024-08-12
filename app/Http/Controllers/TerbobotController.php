<?php

namespace App\Http\Controllers;
use App\Models\Terbobot;
use Illuminate\Http\Request;

class TerbobotController extends Controller
{
    public  function getbobot($id_alternatif,$id_kriteria)
    {
        $data = Terbobot::getbobot($id_alternatif,$id_kriteria);
        return $data;
    }
 
    public  function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
        $data = Terbobot::savingdata($id_alternatif, $id_kriteria,$bobot);
        return $data;
 
    
    }
    public  function deletedata($id_alternatif)
    {
        $data = Terbobot::deletedata($id_alternatif);
        return $data;
    
    
    }

    public  function getalldata()
    {
        $data = Terbobot::getalldata();
        return $data;

    
    }
    public  function getalldatadisticnt()
    {
        $data = Terbobot::getalldatadisticnt();
        return $data;

    
    }
}
