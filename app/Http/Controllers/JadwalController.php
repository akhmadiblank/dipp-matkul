<?php

namespace App\Http\Controllers;

use App\Models\Jadwal;
use App\Models\ruangan;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class JadwalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data["jadwal"]=Jadwal::all();
        return view('admin.jadwal_kegiatan.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        return view('admin.jadwal_kegiatan.create',[
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
        // dd($request);
        $validateData = $request->validate([
            'nama_kegiatan' =>'required',
            'instansi' => 'required',
            'pj_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'waktu_mulai'=> 'required',
            'waktu_selesai'=>'required',
            'ruangan'=>'required',
            'surat_peminjaman'=>'mimetypes:application/pdf'
        ]);
        if ($request->file('surat_peminjaman')) {
            $validateData['surat_peminjaman'] = $request->file('surat_peminjaman')->store('surat-peminjaman');
        }
        // return $request->file('surat_peminjaman')->store('surat-peminjaman');
        // return $validateData;
        jadwal::create($validateData);
        return redirect('/jadwal')->with('success', 'data telah berhasil ditambahkan');


    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function show(Jadwal $jadwal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function edit(Jadwal $jadwal)
    {
        return view('admin.jadwal_kegiatan.edit',[
            'jadwal'=>$jadwal,
            'ruangan'=>ruangan::all()
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Jadwal $jadwal)
    {
        $rules = [
            'nama_kegiatan' =>'required',
            'instansi' => 'required',
            'pj_kegiatan' => 'required',
            'tanggal_kegiatan' => 'required',
            'waktu_mulai'=> 'required',
            'waktu_selesai'=>'required',
            'ruangan'=>'required',
            'surat_peminjaman'=>'mimetypes:application/pdf'
        ];
        $validateData = $request->validate($rules);
        if ($request->file('surat_peminjaman')) {
            if ($jadwal->surat_peminjaman) {
                Storage::delete($jadwal->surat_peminjaman);
            }
            $validateData['surat_peminjaman'] = $request->file('surat_peminjaman')->store('surat-peminjaman');
        }
        Jadwal::where('id', $jadwal->id)
            ->update($validateData);
        return redirect('/jadwal')->with('success', 'Data Berhasil Dirubah');



    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Jadwal  $jadwal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Jadwal $jadwal)
    {
         //dd($post);
         if ($jadwal->surat_peminjaman) {
            Storage::delete($jadwal->surat_peminjaman);
        }

        Jadwal::destroy($jadwal->id);
        return redirect('/jadwal')->with('success', 'Data Telah Berhasil Dihapus');

    }

    public function filterData(){
        
    }
}
