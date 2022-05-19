<?php

namespace App\Http\Controllers;

use App\Models\Faculty;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use App\Http\Requests\StorefacultyRequest;
use App\Http\Requests\UpdatefacultyRequest;
use Illuminate\Http\Request;

class FacultyController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['faculties']=Faculty::all();
        return view('admin.faculties.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.faculties.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StorefacultyRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StorefacultyRequest $request)
    {   
        // @dd($request);
        $request->validate([
            'kode_fakultas' => 'required',
            'nama_fakultas' => 'required'
        ]);
        Faculty::create($request->all());
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
        // return view('admin.faculties.edit',['data'=>$faculty]);
    }
    public function showupdate($id)
    {
        $data=Faculty::findOrFail($id);
        return view('admin.faculties.edit')->with(compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function edit(faculty $faculty)
    {
      
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
        @dd($request);
        $request->validate([
            'kode_fakultas' => 'required',
            'nama_fakultas' => 'required'
        ]);
        Faculty::where('id',$faculty->id)->update([
            'kode_fakultas' => $request->kode_fakultas,
            'nama_fakultas' => $request->nama_fakultas
        ]);
        return redirect('faculties')->with('status', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\faculty  $faculty
     * @return \Illuminate\Http\Response
     */
    public function destroy(Faculty $faculty)
    {
        Faculty::destroy($faculty->id);
        return redirect('faculties')->with('status','DATA '.$faculty->nama_fakultas.' BERHASIL DI HAPUS');
    }
    public function facultyupdate(Request $request, $id){
        $data = Faculty::findOrFail($id);
        $data->kode_fakultas = $request->kode_fakultas;
        $data->nama_fakultas = $request->nama_fakultas;
        $data->save();
        return redirect('faculties')->with('status', 'Data berhasil diubah');
    }
}
