<?php

namespace App\Models;
use App\Models\Faculty;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Prodi extends Model
{
    use HasFactory;
    protected $guarded = ['id'];

    public function faculty(){
        return $this->belongsTo(Faculty::class);
    }
}
