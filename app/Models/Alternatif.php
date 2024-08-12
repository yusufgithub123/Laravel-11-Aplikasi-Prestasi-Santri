<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Alternatif extends Model
{
    use HasFactory;

    protected $table ='alternatif';
    protected $fillable = ['nisn','nama_santri','alamat','nama_ayah','nama_ibu','tingkatan_kelas','gambar'];
    protected $guarded = ['id','created_at','updated_at'];
    public function nilai()
    {
        return $this->hasOne(Nilai::class, 'id_alternatif');
    }
    
}
