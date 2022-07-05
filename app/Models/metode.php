<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class metode extends Model
{
    use HasFactory;
    public function matkul(){
        return $this->belongsTo(Matkul::class,'matkul_id');
    }
}
