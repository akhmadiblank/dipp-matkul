<?php

namespace App\Imports;

use App\Models\Matkul;
use App\Models\Semester;
use App\Models\KategoriUnsur;
use App\Models\StrukturKurikulum;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;

class Struktur_kurikulumsImport implements ToModel,WithHeadingRow
{
    /**
    * @param array $row
    *
    * @return \Illuminate\Database\Eloquent\Model|null
    */
   
    

    public function __construct(int $prodi_id,int $masterkurikulum_id)
    {
        $this->prodi_id = $prodi_id;
        $this->masterkurikulum_id = $masterkurikulum_id;
    }
    public function model(array $row)
    {   

        // dd($row);
        // replace '-' with NULL
        foreach ($row as $key => $value) {
            if($value == '-' || $value == '') {
                $row[$key] = null;
            }
        }
        //get semester
        $semester = Semester::where('semester','like',"%%{$row['semester']}")->first();

        //get matkul
        $matkul = Matkul::where('nama_matkul','like',"%%{$row['nama_matkul']}")->first();

        //kategori unsur
        $value_kategori_unsur=[];
        if($row['kategori_unsur']) {
            $kategori_unsurs = explode(',', $row['kategori_unsur']);
            foreach ($kategori_unsurs as $kategori_unsur) {
                $key=KategoriUnsur::where('kode',$kategori_unsur)->first();
                if($key){
                    array_push($value_kategori_unsur, $key->id); 
                }
            }
        }
    

        //compile data
        $data = [
            'prodi_id'=>$this->prodi_id,
            'masterkurikulum_id'=>$this->masterkurikulum_id,
            'semester_id' =>$semester->id??null,
            'matkul_id'=>$matkul->id??null,
            'beban_studi' =>$row['beban_studi'],
            'bentuk_pembelajaran'=>$row['bentuk_pembelajaran'],
            'prasyarat'=>$row['prasyarat'],
            'project_base_learning'=>$row['project_based_learning'],
            'case_base_learning'=>$row['case_based_learning'],
            'problem_based_learning'=>$row['problem_based_learning'],
            'others'=>$row['others'],
            'keterangan'=>$row['keterangan']
        ];
        $strukturKurikulum = StrukturKurikulum::updateOrCreate($data);
        $strukturKurikulum->kategoriunsurs()->attach($value_kategori_unsur);
        return $strukturKurikulum;

       
    }
}
