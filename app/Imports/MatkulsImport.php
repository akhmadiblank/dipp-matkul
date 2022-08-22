<?php

namespace App\Imports;

use App\Models\Matkul;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class MatkulsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Matkul([
            'kode_matkul'=>$row['kode_matkul'],
            'nama_matkul'=>$row['nama_matkul'],
            'jenjang_id'=>$row['jenjang_id'],
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
