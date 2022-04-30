<?php

namespace App\Http\Controllers;

use App\Models\faculty;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefacultyRequest;
use App\Http\Requests\UpdatefacultyRequest;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faculties']=faculty::all();
        return view('admin.faculties.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefacultyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefacultyRequest $request)
    {
        $request->validate([
            'kode_fakultas' => 'required',
            'nama_fakultas' => 'required'
        ]);
        faculty::create($request->all());
        return redirect('faculties')->with('status', 'Data berhasil ditambahkan');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function show(faculty $faculty)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(faculty $faculty)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdatefacultyRequest  $request
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function update(UpdatefacultyRequest $request, faculty $faculty)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(faculty $faculty)
    {
        faculty::destroy($faculty->id);
        return redirect('faculties')->with('status','DATA '.$faculty->nama_fakultas.' BERHASIL DI HAPUS');
    }
}
