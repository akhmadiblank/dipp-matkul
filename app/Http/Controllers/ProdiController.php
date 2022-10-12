<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Faculty;
use App\Models\Jenjang;
use App\Models\Akreditasi;
use App\Exports\ProdiExport;
use Illuminate\Http\Request;
use App\Imports\ProdisImport;
use App\Models\Masterkurikulum;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Maatwebsite\Excel\Facades\Excel;

class ProdiController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['prodies']=Prodi::with(['faculty','jenjang','akreditasi','masterkurikulums'])->get();
        return view('admin.prodies.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
         $data['faculties']=Faculty::all();
         $data['masterKurikulum']=Masterkurikulum::all();
         $data['jenjang']=Jenjang::all();
         $data['akreditasis']=Akreditasi::all();
         return view('admin.prodies.create',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //  dd($request);
        $validateData = $request->validate([
            'faculty_id' => 'required',
            'kode_prodi' => 'required|unique:prodis,kode_prodi',
            'nama_prodi' => 'required',
            'jenjang_id' => 'required',
            // 'masterKurikulum_id' => 'required',
        ]);
        // dd($validateData);

        
      
        //return $validateData;

        $prodi=Prodi::create($validateData);
        $prodi->akreditasi()->attach($request->akreditasi);
        $prodi->masterkurikulums()->attach($request->masterKurikulum_id);
        
        return redirect('prodi')->with('success', 'Program Studi Sudah berhasil di tambahkan ');

    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function show(Prodi $prodi)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function edit(Prodi $prodi)
    {   
        
        return view('admin.prodies.edit',[
            'faculties'=>Faculty::all(),
            'prodi'=>$prodi,
            'masterKurikulum'=>Masterkurikulum::all(),
            'jenjang' =>Jenjang::all(),
            'akreditasis' =>Akreditasi::all(),
            ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Prodi $prodi)
    {
        $validateData = $request->validate([
            'faculty_id' => 'required',
            'kode_prodi' => 'required',
            'nama_prodi' => 'required',
            'jenjang_id' => 'required',
            
        ]);
        // dd($validateData);

        
      
        //return $validateData;
        Prodi::where('id',$prodi->id)->update($validateData);
        prodi::findOrFail($prodi->id)->akreditasi()->sync($request->akreditasi);
        prodi::findOrFail($prodi->id)->masterkurikulums()->sync($request->masterKurikulum_id);
        return redirect('prodi')->with('success', 'Program Studi Sudah berhasil di update');


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Prodi  $prodi
     * @return \Illuminate\Http\Response
     */
    public function destroy(Prodi $prodi)
    {
        Prodi::findOrFail($prodi->id)->akreditasi()->detach();
        Prodi::findOrFail($prodi->id)->masterkurikulums()->detach();
        Prodi::destroy($prodi->id);
        return redirect('prodi')->with('success', 'Program Studi Sudah berhasil di hapus');

    }

    //filter data by fakultas

    public function filterByFaculty(request $request){
        $data['filterByFaculty']=Prodi::where('faculty_id',$request->id)->get();
        $data['judul']= DB::table('prodis')->where('faculty_id',$request->id)->first();
        return view('admin.prodies.showByFaculty',$data);
    }
    public function ExportProdis() 
    {
        return Excel::download(new ProdiExport, 'daftar prodi.xlsx');
    }
    public function importProdis(request $request) 
    {   
        $file=$request->file('file');
        $namaFile=$file->getClientOriginalName();
        $file->move('DataProdis',$namaFile);
        Excel::import(new ProdisImport,public_path('/DataProdis/'.$namaFile));
        
        return redirect('/prodi')->with('success', 'Data Berhasil di Import');
    }
}
