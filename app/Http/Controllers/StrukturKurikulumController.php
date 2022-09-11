<?php

namespace App\Http\Controllers;

use App\Models\Matkul;
use App\Models\Semester;
use Illuminate\Http\Request;
use App\Models\KategoriUnsur;
use App\Models\StrukturKurikulum;
use App\Exports\Struktur_kurikulumsExport;
use App\Imports\Struktur_kurikulumsImport;
use Maatwebsite\Excel\Facades\Excel;
use id;

class StrukturKurikulumController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $data['kurikulum'] =strukturKurikulum::all();
        // return view('admin.struktur_kurikulum.index',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
   

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // dd($request->kategoriunsurs);
        $validateData = $request->validate([
            'prodi_id' => 'required',
            'masterkurikulum_id' => 'required',
            'semester_id' => 'required',
            'matkul_id' => 'required',
            'beban_studi' => 'nullable',
            'bentuk_pembelajaran'=>'nullable',
            'prasyarat' => 'nullable',
            'project_base_learning' => 'nullable',
            'case_base_learning' => 'nullable',
            'problem_based_learning' => 'nullable',
            'others' => 'nullable',
            'keterangan' => 'nullable',
        ]);
        $validateData['bentuk_pembelajaran']=json_encode($request->bentuk_pembelajaran);
        $validateData['project_base_learning']=$request->boolean('project_base_learning');
        $validateData['case_base_learning']=$request->boolean('case_base_learning');
        $validateData['problem_based_learning']=$request->boolean('problem_based_learning');
        $validateData['others']=$request->boolean('others');
        
        // dd($validateData);
        
        
        //return $validateData;
        
        $strukturKurikulum=StrukturKurikulum::create($validateData);
        $strukturKurikulum->kategoriunsurs()->attach($request->kategoriunsurs);
        return redirect('showkurikulum/'.$request->prodi_id.'/'.$request->masterkurikulum_id.'')->with('success', 'Program Studi Sudah berhasil di tambahkan ');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\StrukturKurikulum  $strukturKurikulum
     * @return \Illuminate\Http\Response
     */
    public function show(StrukturKurikulum $strukturKurikulum)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\StrukturKurikulum  $strukturKurikulum
     * @return \Illuminate\Http\Response
     */
    public function edit(StrukturKurikulum $strukturKurikulum)
    {
        $data['semester']=Semester::all();
        $data['matkul']=Matkul::all();
        $data['kategori_unsurs']=KategoriUnsur::all();
        $data['param']=$strukturKurikulum;
        return view('admin.struktur_kurikulum.edit',$data);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\StrukturKurikulum  $strukturKurikulum
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, StrukturKurikulum $strukturKurikulum)
    {
        $rules = [
            'prodi_id' => 'required',
            'masterkurikulum_id' => 'required',
            'semester_id' => 'required',
            'matkul_id' => 'required',
            'beban_studi' => 'required',
            'bentuk_pembelajaran'=>'nullable',
            'kategoriunsur_id' => 'nullable',
            'prasyarat' => 'nullable',
            'project_base_learning' => 'nullable',
            'case_base_learning' => 'nullable',
            'problem_based_learning' => 'nullable',
            'others' => 'nullable',
            'keterangan' => 'nullable',
        ];
        $validateData = $request->validate($rules);
        $validateData['bentuk_pembelajaran']=json_encode($request->bentuk_pembelajaran);
        $validateData['project_base_learning']=$request->boolean('project_base_learning');
        $validateData['case_base_learning']=$request->boolean('case_base_learning');
        $validateData['problem_based_learning']=$request->boolean('problem_based_learning');
        $validateData['others']=$request->boolean('others');

        // dd($strukturKurikulum);
        StrukturKurikulum::findOrFail($strukturKurikulum->id)->kategoriunsurs()->sync($request->kategoriunsurs);
        StrukturKurikulum::where('id',$strukturKurikulum->id)->update($validateData);
        return redirect('showkurikulum/'.$strukturKurikulum->prodi_id.'/'.$strukturKurikulum->masterkurikulum_id.'')->with('success', 'Program Studi Sudah berhasil di tambahkan ');
   


    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\StrukturKurikulum  $strukturKurikulum
     * @return \Illuminate\Http\Response
     */
    public function destroy(StrukturKurikulum $strukturKurikulum)
    {
        // ddd($strukturKurikulum);
        
        // dd($param->prodi_id);
        StrukturKurikulum::findOrFail($strukturKurikulum->id)->kategoriunsurs()->detach();
        StrukturKurikulum::destroy($strukturKurikulum->id);
        return redirect('showkurikulum/'.$strukturKurikulum->prodi_id.'/'.$strukturKurikulum->masterkurikulum_id)->with('success', 'Program Studi Sudah berhasil di hapus');
    }
    public function createkurikulum($prodi_id,$masterkurikulum_id)
    {
        $data['prodi_id']=$prodi_id;
        $data['masterkurikulum_id']=$masterkurikulum_id;
        $data['semester']=Semester::all();
        $data['matkul']=Matkul::all();
        $data['kategori_unsurs']=KategoriUnsur::all();
        
        return view('admin.struktur_kurikulum.create',$data);
    }

    public function showkurikulum($id,$masterKurikulum_id){
       
        $data['kurikulum']=strukturKurikulum::where('prodi_id',$id)
                          ->where('masterkurikulum_id',$masterKurikulum_id)->get();
        $data['prodi_id']=$id;
        $data['masterkurikulum_id']=$masterKurikulum_id;
        return view('admin.struktur_kurikulum.show',$data);
    }
    public function exportStrukturKurikulum($id,$masterKurikulum_id) 
    {
        //  $param1=settype($id,"integer");
        //  $param2=settype($masterKurikulum_id,"integer");
        //  dd($param1,$param2);
        return Excel::download(new Struktur_kurikulumsExport($id,$masterKurikulum_id),'Strukutur-kurikulum.xlsx');
    }
    public function importStrukturKurikulum(Request $request){

        $prodi_id=$request->prodi_id;
        $masterKurikulum_id=$request->masterkurikulum_id;
        // dd();
        try {
           
            Excel::import(new Struktur_kurikulumsImport($prodi_id,$masterKurikulum_id), request()->file('attachment'));
            return redirect("/showkurikulum/$prodi_id/$masterKurikulum_id")->with('success', 'All data successfully imported!');
        }
        catch (\Maatwebsite\Excel\Validators\ValidationException $e) {
            $failures = $e->failures();
            $errors = '';
            foreach ($failures as $failure)  {
                $errors.= "Row {$failure->row()} : ";
                $errors.= implode(',', $failure->errors()).' ';
            }
            return redirect("/showkurikulum/$prodi_id/$masterKurikulum_id")->with('error', $errors);
        }
    }
}
