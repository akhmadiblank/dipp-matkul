<?php

namespace App\Models;
use App\Models\Matkul;
use App\Models\Faculty;
use App\Models\Masterkurikulum;
use App\Models\StrukturKurikulum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function faculty(){
        return $this->belongsTo(Faculty::class,'faculty_id');
    }
   
    public function matkul(){
        return $this->hasMany(Matkul::class);
    }

    public function strukturkurikulum(){
        return $this->hasMany(StrukturKurikulum::class);
    }

    public function jenjang(){
        return $this->belongsTo(Jenjang::class,'jenjang_id');
    }
    public function akreditasi(){
        return $this->belongsToMany(Akreditasi::class);
    }

    public function masterkurikulums(){
        return $this->belongsToMany(Masterkurikulum::class);
    }
}
