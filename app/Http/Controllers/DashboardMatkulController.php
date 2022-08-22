<?php

namespace App\Http\Controllers;

use App\Models\Prodi;
use App\Models\Matkul;
use App\Models\Faculty;
use Illuminate\Http\Request;
use App\Models\StrukturKurikulum;
use App\Http\Controllers\Controller;

class DashboardMatkulController extends Controller
{
    public function index(){
        $data['jumlahFaculty']=Faculty::all();
        $data['jumlahProdi']=Prodi::all();
        $data['jumlahMatkul']=Matkul::all();
        $data['jumlahpbl']=StrukturKurikulum::where('problem_based_learning',1)->get();
        $data['jumlahcbl']=StrukturKurikulum::where('case_base_learning',1)->get();
        $data['jumlahpjbl']=StrukturKurikulum::where('project_base_learning',1)->get();
        $data['jumlahothers']=StrukturKurikulum::where('others',1)->get();
        return view('admin.dashboard.dashboard',$data);
    }
}
