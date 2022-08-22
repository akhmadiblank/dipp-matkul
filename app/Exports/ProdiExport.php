<?php

namespace App\Exports;

use App\Models\Prodi;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class ProdiExport implements FromCollection,WithHeadings,WithCustomStartCell
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function startCell(): string
    {
        return 'B2';
    }
    public function collection()
    {
        $prodi=Prodi::all();
        $prodi=$prodi->makeHidden(['id','created_at','updated_at']);
        return $prodi;
    }
    public function headings(): array
    {
        return [
            'faculty_id',
            'Kode Prodi',
            'Nama Prodi',
            'jenjang_id',
            'masterKurikulum_id',
        ];
    }
}
