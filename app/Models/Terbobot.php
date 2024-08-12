<?php

namespace App\Models;

use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Terbobot extends Model
{
    use HasFactory;

    protected $table = 'terbobot';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'bobot'];
    protected $guarded = ['id','created_at','updated_at'];

    public static function getbobot($id_alternatif, $id_kriteria)
    {
     $data = DB::select("select bobot * (SELECT kriteria.bobot FROM kriteria WHERE id = ?) as bobot FROM normalisasi WHERE id_alternatif =  ? AND id_kriteria = ?", [$id_kriteria, $id_alternatif, $id_kriteria]);

     if (!empty($data)) {
        return $data[0]->bobot;
    } else {
        return null; // or handle the case where no data is found
    }
    }
 
    public static function savingdata($id_alternatif, $id_kriteria,$bobot)
    {
 
     try {
       
         $save =  DB::table('terbobot')->insert([
             'id_alternatif' => $id_alternatif,
             'id_kriteria' => $id_kriteria,
             'bobot' => $bobot
         ]);
        
         return "Success";
     } catch (\Exception $e) {
         return $e;
     }
 
    
    }
    public static function deletedata($id_alternatif)
    {
 
     try {
         $save = DB::table('terbobot')
         ->Where("id_alternatif",$id_alternatif)
         ->delete();
 
         return "Success";
     } catch (\Exception $e) {
         return $e;
     }
 
    
    }

    public static function getalldata()
    {
     $data = DB::select("SELECT * FROM terbobot LEFT JOIN alternatif ON terbobot.id_alternatif = alternatif.id");
     return $data;
    }

    public static function getalldatadisticnt()
    {
     $data = DB::select("SELECT DISTINCT(id_alternatif) FROM terbobot");
     return $data;
    }
}