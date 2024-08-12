<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Rank extends Model
{
    use HasFactory;

    protected $table = 'rank';
    protected $fillable = ['id_alternatif', 'bobot'];
    protected $guarded = ['id','created_at','updated_at'];

    public static function getbobot($id_alternatif)
    {
     $data = DB::select("select SUM(bobot) as bobot FROM terbobot WHERE id_alternatif =  '".$id_alternatif."'" );
     return $data[0]->bobot;
    }
 
    public static function savingdata($id_alternatif,$bobot)
    {
 
     try {
       
         $save =  DB::table('rank')->insert([
             'id_alternatif' => $id_alternatif,
            
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
         $delete = DB::table('rank')
         ->Where("id_alternatif",$id_alternatif)
         ->delete();
 
         return "Success";
     } catch (\Exception $e) {
         return $e;
     }
 
    
    }

    public static function getall()
    {
     $data = DB::select("select * FROM myprojek.rank LEFT JOIN alternatif ON myprojek.rank.id_alternatif = alternatif.id ORDER BY myprojek.rank.bobot DESC");
     return $data;
    }
}
