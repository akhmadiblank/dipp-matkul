<?php

namespace App\Http\Middleware\admin;
use Closure;
use App\Models\Prodi;
use App\Models\Matkul;
use App\Models\Faculty;
use App\Models\StrukturKurikulum;

class shareVariable{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $listFaculty=Faculty::all();
        // $jumlahFaculty=Faculty::all();
        // $jumlahProdi=Prodi::all();
        // $jumlahMatkul=Matkul::all();
        // $jumlahpbl=StrukturKurikulum::where('problem_based_learning',1)->get();
        // $jumlahcbl=StrukturKurikulum::where('case_base_learning',1)->get();
        // $jumlahpjbl=StrukturKurikulum::where('project_base_learning',1)->get();
        // $jumlahothers=StrukturKurikulum::where('others',1)->get();
        
        view()->share(compact('listFaculty'));
        // view()->share(compact('jumlahFaculty'));
        // view()->share(compact('jumlahProdi'));
        // view()->share(compact('jumlahMatkul'));
        // view()->share(compact('jumlahpbl'));
        // view()->share(compact('jumlahcbl'));
        // view()->share(compact('jumlahpjbl'));
        // view()->share(compact('jumlahothers'));
        
        return $next($request);
    }
}