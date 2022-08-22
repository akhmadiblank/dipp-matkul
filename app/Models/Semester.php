<?php

namespace App\Models;

use App\Models\StrukturKurikulum;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Semester extends Model
{
    use HasFactory;
    public function strukturkurikulum(){
        return $this->hasMany(StrukturKurikulum::class);
    }

}
