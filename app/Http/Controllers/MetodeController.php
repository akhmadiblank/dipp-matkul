<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\metode;
use App\Models\Faculty;
use Illuminate\Http\Request;

class MetodeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['metodes'] = metode::all();
        // $data['metodes'] = metode::where('');
        return view('fakultas.Fak_kedokteran_gigi.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data["fakultas"] = Faculty::find(12)->prodi;
        return view('fakultas.Fak_kedokteran_gigi.create',$data);
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
            'matkul_id' => 'required',
            'nama_prodi' => 'required',
        ]);
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function show(metode $metode)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function edit(metode $metode)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, metode $metode)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\metode  $metode
     * @return \Illuminate\Http\Response
     */
    public function destroy(metode $metode)
    {
        //
    }
}
