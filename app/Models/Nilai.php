<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use App\Models\Alternatif;
use App\Models\Kriteria;

class Nilai extends Model
{
    use HasFactory;

    protected $table = 'nilai';
    protected $fillable = ['id_alternatif', 'id_kriteria', 'nilai'];
    protected $guarded = ['id','created_at','updated_at'];
    
    public function alternatif(): BelongsTo
    {
        return $this->belongsTo(Alternatif::class, 'id_alternatif', 'id');
    }

    public static function getNilai()
    {   
        
        $data = DB::select("SELECT * FROM nilai LEFT JOIN alternatif ON
        nilai.id_alternatif = alternatif.id");
        return $data;
        
    }

    public static function getList()
    {   
        
        $data = DB::select("SELECT DISTINCT(id_alternatif) FROM nilai ");
        return $data;
        
    }

    public static function getPenilaian($id_alternatif)
    {   
        
        $data = DB::select("SELECT * FROM nilai WHERE id_alternatif = '".$id_alternatif."'");
        return $data;
        
    }

    public static function getAllData($id_alternatif)
    {   
        
        $data = DB::select("SELECT * FROM nilai LEFT JOIN alternatif ON
        nilai.id_alternatif = alternatif.id WHERE nilai.id_alternatif = $id_alternatif");
        return $data;
        
    }

    public function kriteria(): BelongsTo
    {
        return $this->belongsTo(Kriteria::class, 'id_kriteria', 'id');
    }
}
