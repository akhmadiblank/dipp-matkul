<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class KategoriUnsur extends Model
{
    use HasFactory;
    protected $table = 'kategori_unsurs';
    public function strukturkurikulums(){
        return $this->belongsToMany(StrukturKurikulum::class);
    }

}
