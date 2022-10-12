<?php

namespace App\Imports;

use App\Models\Akreditasi;
use App\Models\Prodi;
use App\Models\Faculty;
use App\Models\Jenjang;
use App\Models\Masterkurikulum;
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
         //dd($row);
         // replace '-' with NULL
         foreach ($row as $key => $value) {
            if($value == '-' || $value == '') {
                $row[$key] = null;
            }
        }
        //get faculty_id
        $faculty = Faculty::where('nama_fakultas','like',"%%{$row['fakultas']}")->first();

        //jenjang_id
        $jenjang=Jenjang::where('nama','like',"%%{$row['jenjang']}")->first();
        
        //akreditasi
        $value_akreditasis=[];
        if($row['akreditasi']) {
            $akreditasis = explode(',', $row['akreditasi']);
            foreach ($akreditasis as $akreditasi) {
                $key=Akreditasi::where('kode',$akreditasi)->first();
                if($key){
                    array_push($value_akreditasis, $key->id); 
                }
            }
        }
        //tahun kurikulum
        $value_tahun_kurikulum=[];
        if($row['tahun_kurikulum']) {
            $tahun_kurikulums = explode(',', $row['tahun_kurikulum']);
            foreach ($tahun_kurikulums as $tahun_kurikulum) {
                $key=Masterkurikulum::where('tahun_kurikulum',$tahun_kurikulum)->first();
                if($key){
                    array_push($value_tahun_kurikulum, $key->id); 
                }
            }
        }

        //compaile data
        $data = [
            'faculty_id'=>$faculty->id??'_',
            'kode_prodi' =>$row['kode_program_studi'],
            'nama_prodi'=>$row['nama_program_studi'],
            'jenjang_id'=>$jenjang->id??'_',
        ];

        $prodi=Prodi::Create($data);
        $prodi->akreditasi()->attach($value_akreditasis);
        $prodi->masterkurikulums()->attach($value_tahun_kurikulum);
        return $prodi;
    }
   
}
