<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class faculty extends Model
{
    protected $primarykey='kode_fakultas';
    public $incrementing=false;
    use HasFactory;
    protected $guarded = [];

    public function getRouteKeyName()
    {
        return 'kode_fakultas';
    }
}

