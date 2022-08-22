<?php

namespace App\Exports;

use App\Models\Matkul;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;
use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class MatkulsExport implements FromCollection,WithHeadings,WithCustomStartCell
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
        $matkuls=Matkul::all();
        $matkuls = $matkuls->makeHidden(['id','created_at','updated_at']);
        return $matkuls;
    }
    public function headings(): array
    {
        return [
            'Kode Matkul',
            'Nama Matkul',
            'jenjang_id'
        ];
    }
}
