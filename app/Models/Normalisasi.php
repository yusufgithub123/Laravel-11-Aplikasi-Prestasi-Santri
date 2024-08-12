<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Normalisasi extends Model
{
    use HasFactory;

    protected $table = 'normalisasi';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'bobot'];
    protected $guarded = ['id','created_at','updated_at'];

    public static function getbobot($id_alternatif, $id_kriteria)
    {
        $dataNilai = DB::select("SELECT nilai.nilai, kriteria.atribut FROM nilai left join kriteria on kriteria.id = nilai.id_kriteria WHERE id_alternatif = ? AND id_kriteria = ?", [$id_alternatif, $id_kriteria]);
        
        if ($dataNilai[0]->atribut == 'Benefit') {
            $data = DB::select('SELECT nilai / (SELECT MAX(nilai) FROM nilai WHERE id_kriteria = ?) as nilai FROM nilai WHERE id_alternatif = ? AND id_kriteria = ?', [$id_kriteria, $id_alternatif, $id_kriteria]);
        } else {
            $data = DB::select('SELECT min(nilai) / (select nilai from nilai where id_kriteria = ? AND id_alternatif = ?) as nilai from nilai where id_kriteria = ?', [$id_kriteria, $id_alternatif, $id_kriteria]);
        }
        
        if(!empty($data)){
            return $data[0]->nilai;
        }
        
        return null; // Or handle the case when no data is found as needed
    }

    public static function savingdata($id_alternatif, $id_kriteria, $bobot)
    {
        try {
            DB::table('normalisasi')->insert([
                'id_alternatif' => $id_alternatif,
                'id_kriteria' => $id_kriteria,
                'bobot' => $bobot
            ]);

            return "Success";
        } catch (\Exception $e) {
            return $e->getMessage(); // Return the error message as a string
        }
    }

    public static function deletedata($id_alternatif)
    {
        try {
            DB::table('normalisasi')
                ->where("id_alternatif", $id_alternatif)
                ->delete();

            return "Success";
        } catch (\Exception $e) {
            return $e->getMessage(); // Return the error message as a string
        }
    }

    public static function getalldata()
    {
        return DB::select("SELECT * FROM normalisasi LEFT JOIN alternatif ON normalisasi.id_alternatif = alternatif.id");
    }

    public static function getalldatadisticnt()
    {
        return DB::select("SELECT DISTINCT(id_alternatif) FROM normalisasi");
    }
}
