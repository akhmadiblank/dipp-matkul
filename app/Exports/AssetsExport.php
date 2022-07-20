<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;

class AssetsExport implements FromCollection
{
    /**
    * @return \Illuminate\Support\Collection
    */
    public function collection()
    {   $asset = Asset::all();
        $asset = $asset->makeHidden(['foto_barang','created_at','updated_at']);
        // return Asset::all();
        return $asset;
    }
}
