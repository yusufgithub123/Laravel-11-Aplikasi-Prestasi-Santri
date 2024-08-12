<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Kriteria extends Model
{
    use HasFactory;

    protected $table ='kriteria';
    protected $fillable = ['nama_kriteria','atribut','bobot'];
    protected $guarded = ['id','created_at','updated_at'];
}
