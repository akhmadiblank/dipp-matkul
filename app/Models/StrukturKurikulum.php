<?php

namespace App\Models;

use App\Models\Prodi;
use App\Models\Matkul;
use App\Models\Semester;
use App\Models\KategoriUnsur;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class StrukturKurikulum extends Model
{
    use HasFactory;
    // protected $table='struktur_kurikulums';
    protected $guarded = ['id'];
    public function semester(){
        return $this->belongsTo(Semester::class,'semester_id');
    }
    public function matkul(){
        return $this->belongsTo(Matkul::class,'matkul_id');
    }
    public function kategoriunsur(){
        return $this->belongsTo(KategoriUnsur::class,'kategoriunsur_id');
    }
    public function prodi(){
        return $this->belongsTo(Prodi::class,'prodi_id');
    }
}
