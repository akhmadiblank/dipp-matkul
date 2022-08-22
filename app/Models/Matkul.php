<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Matkul extends Model
{
    use HasFactory;
    // protected $table = "matkuls";
    protected $guarded=['id'];
    public function prodi(){
        return $this->belongsTo(Prodi::class,'prodi_id');
    }

    // public function metode(){
    //     return $this->hasMany(metode::class);
    // }
    public function strukturkurikulum(){
        return $this->hasMany(Strukturkurikulum::class);
    }
    public function jenjang(){
        return $this->belongsTo(Jenjang::class,"jenjang_id");
    }
}
