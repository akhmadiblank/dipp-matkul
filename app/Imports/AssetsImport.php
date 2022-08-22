<?php

namespace App\Imports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithMappedCells;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class AssetsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    // public function mapping(): array
    // {
    //     return [
    //         'Kode Barang'  => 'B3',
    //         'Nama Barang' => 'C3',
    //         'Merk' => 'D3',
    //         'Tanggal Perolehan' => 'E3',
    //         'Ruangan' => 'F3',
    //         'Sumber Dana' => 'G3',
    //         'Jumlah' => 'H3',
    //         'Harga' => 'I3',
    //         'Status' => 'J3',
    //         'Keterangan' => 'K3',
    //     ];
    // }
    public function model(array $row)
    {
         // $date = date('Y-m-d', strtotime(str_replace('-', '/', $row[3])));   
         return new Asset([
            'kode_barang'=>$row['kode_barang'],
            'nama_barang'=>$row['nama_barang'],
            'merk_barang'=>$row['merk'],
            'tanggal_perolehan'=>$row['tanggal_perolehan'],
            'ruangan_id'=>$row['ruangan'],
            'sumber_dana'=>$row['sumber_dana'],
            'jumlah_barang'=>$row['jumlah'],
            'harga_barang'=>$row['harga'],
            'status'=>$row['status'],
            'keterangan'=>$row['keterangan']
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
