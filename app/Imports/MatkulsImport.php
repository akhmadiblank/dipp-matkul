<?php

namespace App\Imports;

use App\Models\Matkul;
use App\Models\Jenjang;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;
use Illuminate\Validation\Rule;

class MatkulsImport implements ToModel,WithHeadingRow,WithValidation
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
    
    public function model(array $row)
    {
        foreach ($row as $key => $value) {
            if($value == '-' || $value == '') {
                $row[$key] = null;
            }
        }
        //jenjang_id
        $jenjang=Jenjang::where('nama','like',"%%{$row['jenjang']}")->first();

        //compile data
        $data=[
            'kode_matkul'=>$row['kode_mata_kuliah'],
            'nama_matkul'=>$row['nama_mata_kuliah'],
            'jenjang_id'=>$jenjang->id??'_',
        ];
        $matkul= Matkul::updateOrCreate($data);
        return $matkul;
    }
    public function rules(): array
    {
        return [
            'kode_matkul' => Rule::unique('matkuls', 'kode_matkul')
                ->where(function($query) {
                    $query->where('jenjang_id', $this->jenjang_id);
                })
        ];
    }


    public function customValidationMessages()
    {
        return [
            'kode_matkul.unique' => 'Kode mata kuliah sudah terdaftar pada jenjang ini.'
        ];
    }


    
}
