<?php

namespace App\Imports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ToModel;

class AssetsImport implements ToModel
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
         // $date = date('Y-m-d', strtotime(str_replace('-', '/', $row[3])));   
         return new Asset([
            'kode_barang'=>$row[1],
            'nama_barang'=>$row[2],
            'merk_barang'=>$row[3],
            // 'tanggal_perolehan'=>$date,
            'tanggal_perolehan'=>$row[4],
            'ruangan_id'=>$row[5],
            'sumber_dana'=>$row[6],
            'jumlah_barang'=>$row[7],
            'harga_barang'=>$row[8],
            'keterangan'=>$row[9],
            'status'=>$row[10]
        ]);
    }
}
