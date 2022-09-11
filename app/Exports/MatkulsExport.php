<?php

namespace App\Exports;

use App\Models\Matkul;
use Illuminate\Contracts\View\View;
use Maatwebsite\Excel\Concerns\Exportable;
use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\ShouldAutoSize;


class MatkulsExport implements FromView,ShouldAutoSize
{
    /**
    * @return \Illuminate\Support\Collection
    */
    use Exportable;
    public function view(): View
    {
    
        
        $this->data=Matkul::all()
                    ->transform(function($item){
                        return [
                            'kode_matkul' => $item->kode_matkul??'-',
                            'nama_matkul' => $item->nama_matkul??'_',
                            'jenjang'=>$item->jenjang->nama??'_',
                        ];
                    });

        return view('admin.matkul.export', [
            'items' => $this->data,
        ]);
    }
    
}
