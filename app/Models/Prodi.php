<?php

namespace App\Models;
use App\Models\Matkul;
use App\Models\Faculty;
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
}
