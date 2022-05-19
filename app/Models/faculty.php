<?php

namespace App\Models;

use App\Models\Prodi;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Faculty extends Model
{
    // protected $primarykey='kode_fakultas';
    // public $incrementing=false;
    use HasFactory;
    protected $guarded = ['id'];

    // public function getRouteKeyName()
    // {
    //     return 'kode_fakultas';
    // }


    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}

