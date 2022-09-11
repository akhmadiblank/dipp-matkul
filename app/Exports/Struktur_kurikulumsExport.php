<?php

namespace App\Exports;

use App\Models\StrukturKurikulum;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\FromQuery;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\WithColumnFormatting;
use Maatwebsite\Excel\Concerns\WithStyles;
use PhpOffice\PhpSpreadsheet\Shared\Date;
use PhpOffice\PhpSpreadsheet\Style\NumberFormat;
use PhpOffice\PhpSpreadsheet\Worksheet\Worksheet;

class Struktur_kurikulumsExport implements FromView,ShouldAutoSize
{
    use Exportable;
    /**
    * @return \Illuminate\Support\Collection
    */
    private $data;
    private $id;
    private $masterkurikulum_id;
    

    public function __construct(int $id,int $masterkurikulum_id)
    {
        $this->id = $id;
        $this->masterkurikulum_id = $masterkurikulum_id;
        

    }
    // public function collection()
    // {
    //     return StrukturKurikulum::all();
    // }
    // public function query()
    // {
    //     return StrukturKurikulum::query()->where('prodi_id', $this->id)->where('masterkurikulum_id',$this->masterkurikulum_id);
    // }
    public function view(): View
    {
    $struktur = StrukturKurikulum::where('prodi_id',$this->id);
        $struktur->where('masterkurikulum_id',$this->masterkurikulum_id);
        $this->data=$struktur->get()
                    ->transform(function($item){
                        return [
                            'semester' => $item->semester->semester??'-',
                            'nama_matkul' => $item->matkul->nama_matkul??'_',
                            'beban_studi'=>$item->beban_studi??'_',
                            'bentuk_pembelajaran'=>$item->bentuk_pembelajaran,
                            'kategori_unsur'=>$item->kategoriunsurs->implode('kode',','),
                            'prasyarat'=>$item->prasyarat??'_',
                            'project_base_learning' =>$item->project_base_learning??'_',
                            'case_base_learning' =>$item->case_base_learning ??'_',
                            'problem_based_learning' => $item->problem_based_learning ??'_',
                            'others'=> $item->others ??'_',
                            'keterangan' => $item->keterangan ??'_',
                        ];
                    });

        return view('admin.struktur_kurikulum.export', [
            'items' => $this->data,
        ]);
    }
    // public function styles(Worksheet $sheet)
    // {
    //     $styleArray = [
    //         'borders' => [
    //             'outline' => [
    //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 'color' => ['rgb' => '3c3c3c'],
    //             ],
    //         ],
    //         'font' => ['bold' => true, 'color' => ['rgb' => 'ffffff']],
    //     ];

    //     $styleThinArray = [
    //         'borders' => [
    //             'outline' => [
    //                 'borderStyle' => \PhpOffice\PhpSpreadsheet\Style\Border::BORDER_THIN,
    //                 'color' => ['rgb' => '3c3c3c'],
    //             ],
    //         ],
    //     ];

    //     $column = 'A6:AW6';
    //     $sheet->getStyle($column)
    //         ->getFill()->setFillType(\PhpOffice\PhpSpreadsheet\Style\Fill::FILL_SOLID)
    //         ->getStartColor()->setRGB('28235f');
    //     $sheet->getStyle($column)->applyFromArray($styleArray);
    //     $sheet->getStyle($column)->applyFromArray($styleThinArray);

    //     $limit = 6 + $this->data->count();

    //     $chars = createColumnsArray('AW');
    //     foreach ($chars as $char) {
    //         $sheet->getStyle("{$char}6:{$char}".$limit)->applyFromArray($styleThinArray);
    //     }
    // }

}

