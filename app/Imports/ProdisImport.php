<?php

namespace App\Imports;

use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class ProdisImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    public function model(array $row)
    {
        return new Prodi([
            'faculty_id'=>$row['faculty_id'],
            'kode_prodi'=>$row['kode_prodi'],
            'nama_prodi'=>$row['nama_prodi'],
            'jenjang_id'=>$row['jenjang_id'],
            'masterKurikulum_id'=>$row['masterkurikulum_id'],
           
            
        ]);
    }
    public function headingRow(): int
    {
        return 2;
    }
}
