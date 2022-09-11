<?php

namespace App\Http\Controllers;

use App\Models\Asset;
use App\Models\ruangan;
// use Barryvdh\DomPDF\PDF;
use Barryvdh\DomPDF\Facade as PDF;
use Illuminate\Http\Request;
use App\Exports\AssetsExport;
use App\Imports\AssetsImport;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;
use Illuminate\Support\Facades\Storage;


class AssetController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('admin.asset.index',[
            'asset' =>Asset::all(),
            'ruangan' =>ruangan::all()
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.asset.create',[
            'ruangan'=>ruangan::all()
        ]);
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
            'kode_barang' =>'required|unique:assets,kode_barang',
            'sumber_dana' => 'required',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'merk_barang'=> 'required',
            'harga_barang'=>'required',
            'tanggal_perolehan'=>'required',
            'keterangan'=>'required',
            'status'=>'required',
            'ruangan_id'=>'required',
            'foto_barang'=>'mimes:jpg,jpeg,png,pdf'
        ]);

        // dd($validateData);
        if ($request->file('foto_barang')) {
            $validateData['foto_barang'] = $request->file('foto_barang')->store('foto_barang');
        }
        // $request->file('foto_barang')->store('foto_barang');
      
        Asset::create($validateData);
        return redirect('/asset')->with('success', 'data telah berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function show(Asset $asset)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function edit(Asset $asset)
    {
        return view('admin.asset.edit',[
            'asset' =>$asset,
            'ruangan' =>ruangan::all(),
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Asset $asset)
    {
        $rules = [
            'sumber_dana' => 'required',
            'nama_barang' => 'required',
            'jumlah_barang' => 'required',
            'merk_barang'=> 'required',
            'harga_barang'=>'required',
            'tanggal_perolehan'=>'required',
            'keterangan'=>'required',
            'status'=>'required',
            'ruangan_id'=>'required',
            'foto_barang'=>'mimes:jpg,jpeg,png,pdf'
        ];
        if ($request->kode_barang != $asset->kode_barang) {
            $rules['kode_barang'] = 'required|unique:assets,kode_barang';
        }

        $validateData = $request->validate($rules);
        if ($request->file('foto_barang')) {
            if ($asset->foto_barang) {
                Storage::delete($asset->foto_barang);
            }
            $validateData['foto_barang'] = $request->file('foto_barang')->store('foto_barang');
        }
        Asset::where('id', $asset->id)
            ->update($validateData);
        return redirect('/asset')->with('success', 'Data Berhasil Dirubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Asset  $asset
     * @return \Illuminate\Http\Response
     */
    public function destroy(Asset $asset)
    {
        if ($asset->foto_barang) {
            Storage::delete($asset->foto_barang);
        }

        Asset::destroy($asset->id);
        return redirect('/asset')->with('success', 'Data Telah Berhasil Dihapus');
    }

    public function assetsExport(){
        return Excel::download(new AssetsExport,'Asset.xlsx');
    }

    public function assetsImport(request $request){
        $file=$request->file('file');
        $namaFile=$file->getClientOriginalName();
        $file->move('DataAsset',$namaFile);
        Excel::import(new AssetsImport,public_path('/DataAsset/'.$namaFile));
        return redirect('/asset');
    }
    public function showRoom(Request $request){
        // @dd($request);
        $room = Asset::where('ruangan_id',$request->id)->get();
        return view('admin.asset.show',[
            'room' =>$room,
            'nama_ruang' =>$request->nama_ruang,
        ]);
    }

    public function cetak_laporan(Request $request){
        $room = Asset::where('ruangan_id',$request->id)->get();
        $pdf = app('dompdf.wrapper');
        $pdf->setOptions(['defaultFont' => 'dejavu serif','isHtml5ParserEnabled' => true,'isRemoteEnabled' => true]);
       
        //  $pdf->setPaper('a4', 'potrait');
        $pdf->loadView('admin.asset.print',[
            'room'=>$room,
            'nama_ruang' =>$request->nama_ruang,
        ]);
        return $pdf->stream();
        
    }
}
