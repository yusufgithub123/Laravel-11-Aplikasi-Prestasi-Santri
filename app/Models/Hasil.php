<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hasil extends Model
{
    use HasFactory;

    protected $table ='Hasil';
    protected $fillable = ['id_terbobot','nilai_hasil'];
    protected $guarded = ['id','created_at','updated_at'];
}
