<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Masterkurikulum extends Model
{
    protected $table = 'masterkurikulum';
    use HasFactory;
    public function prodi(){
        return $this->hasMany(Prodi::class);
    }
}
