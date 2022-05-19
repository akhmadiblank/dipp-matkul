<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Matkul;
use Illuminate\Http\Request;

class MatkulController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.matkul.index',[
            'matkuls' => Matkul::all()
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
            'prodi_id' => 'required',
            'kode_matkul' => 'required|unique:matkuls,kode_matkul',
            'nama_matkul' => 'required',
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
            'prodis' => Prodi::all(),
            'matkul' =>$matkul
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
            'prodi_id' => 'required',
            'kode_matkul' => 'required',
            'nama_matkul' => 'required',
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
        matkul::destroy($matkul->id);
        return redirect('matkul')->with('success', 'Mata kuliah Sudah berhasil di hapus');

    }
}
