<?php

namespace App\Exports;

use App\Models\Asset;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithCustomStartCell;

use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;

use Maatwebsite\Excel\Concerns\WithHeadings;
use Maatwebsite\Excel\Concerns\Exportable;

class AssetsExport implements FromCollection,WithHeadings,WithCustomStartCell,WithColumnFormatting
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function startCell(): string
    {
        return 'B2';
    }

    // public function query()
    // {
    //     return Asset::query();
    // }
    public function collection()
    {   
        // $asset = Asset::all();
        $asset = Asset::where('id', 1)->get();
        $asset = $asset->makeHidden(['id','foto_barang','created_at','updated_at']);
        // return Asset::all();
        return $asset;
    }
    // public function map($asset): array
    // {
    //     return [
    //         Date::dateTimeToExcel($asset->tanggal_perolehan)  
    //     ];
    // }
    
    public function columnFormats(): array
    {
        return [
            'E' => NumberFormat::FORMAT_DATE_DDMMYYYY
          
        ];
    }

    public function headings(): array
    {
        return [
            'Kode Barang',
            'Nama Barang',
            'Merk',
            'Tanggal Perolehan',
            'Ruangan',
            'Sumber Dana',
            'Jumlah',
            'Harga',
            'Status',
            'Keterangan'
        ];
    }
    
}
