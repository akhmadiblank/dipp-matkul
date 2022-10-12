<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Jenjang;
use App\Models\Matkul;
use Illuminate\Http\Request;
use App\Exports\MatkulsExport;
use App\Imports\MatkulsImport;
use Maatwebsite\Excel\Facades\Excel;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $matkuls=Matkul::with('jenjang');
        if(request('search')){
            $matkuls->where('nama_matkul','like','%'.request('search').'%')
                    ->orWhere('kode_matkul','like','%'.request('search').'%');
        }
        return view('admin.matkul.index',[
            'matkuls' =>$matkuls->paginate(50)      
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $data['prodis']=Prodi::all();
        $data['jenjang']=Jenjang::all();
        return view('admin.matkul.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $validateData = $request->validate([
            'kode_matkul' => 'required|unique:matkuls,kode_matkul',
            'nama_matkul' => 'required',
            'jenjang_id' => 'required',
        ]);
        // dd($validateData);
        //return $validateData;
        Matkul::create($validateData);
        return redirect('matkul')->with('success', 'Mata Kuliah Sudah berhasil di tambahkan ');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function show(matkul $matkul)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function edit(matkul $matkul)
    {
        return view('admin.matkul.edit',[
            
            'matkul' =>$matkul,
            'jenjang'=>Jenjang::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, matkul $matkul)
    {
        $rules = [
            
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
            'jenjang_id' => 'required',
        ];
        $validateData = $request->validate($rules);
        Matkul::where('id', $matkul->id)
            ->update($validateData);
        return redirect('matkul')->with('success', 'Mata Kuliah Sudah berhasil di update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\matkul  $matkul
     * @return \Illuminate\Http\Response
     */
    public function destroy(matkul $matkul)
    {
        // dd($matkul);
        matkul::destroy($matkul->id);
        return redirect('matkul')->with('success', 'Mata kuliah Sudah berhasil di hapus');

    }

    public function exportMatkuls() 
    {
        return Excel::download(new MatkulsExport, 'daftar mata kuliah.xlsx');
    }
    public function importMatkuls(request $request) 
    {   
        $file=$request->file('file');
        $namaFile=$file->getClientOriginalName();
        $file->move('DataMatkuls',$namaFile);
        Excel::import(new MatkulsImport,public_path('/DataMatkuls/'.$namaFile));
        
        return redirect('/matkul')->with('success', 'Data Berhasil di Import');
    }
}
