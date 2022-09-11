<?php

namespace App\Exports;

use App\Models\Prodi;
// use Maatwebsite\Excel\Concerns\FromCollection;
// use Maatwebsite\Excel\Concerns\WithCustomStartCell;
// use Maatwebsite\Excel\Concerns\WithHeadings;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;
use Maatwebsite\Excel\Concerns\Exportable;

class ProdiExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    // public function startCell(): string
    // {
    //     return 'B2';
    // }
    // public function collection()
    // {
    //     $prodi=Prodi::all();
    //     $prodi=$prodi->makeHidden(['id','created_at','updated_at']);
    //     return $prodi;
    // }
    // public function headings(): array
    // {
    //     return [
    //         'faculty_id',
    //         'Kode Prodi',
    //         'Nama Prodi',
    //         'jenjang_id',
    //     ];
    // }
    public function view(): View
    {
    
        
        $this->data=Prodi::all()
                    ->transform(function($item){
                        return [
                            'fakultas' => $item->faculty->nama_fakultas??'-',
                            'kode_prodi' => $item->kode_prodi??'_',
                            'nama_prodi'=>$item->nama_prodi??'_',
                            'jenjang'=>$item->jenjang->nama??'_',
                            'akreditasi'=>$item->akreditasi->implode('kode',','),
                            'masterKurikulum' =>$item->masterKurikulums->implode('tahun_kurikulum',',')
                        ];
                    });

        return view('admin.prodies.export', [
            'items' => $this->data,
        ]);
    }
}
