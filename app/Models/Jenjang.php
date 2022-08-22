<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Jenjang extends Model
{
    use HasFactory;
    public function matkul(){
        return $this->hasMany(Matkul::class);
    }
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}
