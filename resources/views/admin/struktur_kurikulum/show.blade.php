@extends('admin.manajemen_mata_kuliah.template.layout')


@section('title')
    Dashboard |
@endsection
@section('content')

<!-- page content -->
<div class="right_col" role="main">
  

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
     
      
        <div class="x_panel">
          <div class="x_title">
            <h2>Struktur Kurikulum</h2><br>
            
            <ul class="nav navbar-right panel_toolbox">
              <li><a class="collapse-link"><i class="fa fa-chevron-up"></i></a>
              </li>
              <li class="dropdown">
                <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-expanded="false"><i class="fa fa-wrench"></i></a>
                <div class="dropdown-menu" aria-labelledby="dropdownMenuButton">
                    <a class="dropdown-item" href="#">Settings 1</a>
                    <a class="dropdown-item" href="#">Settings 2</a>
                  </div>
              </li>
              <li><a class="close-link"><i class="fa fa-close"></i></a>
              </li>
            </ul>
            <div class="clearfix"></div>
          </div>
          <div class="x_content">
              <div class="row">
                <div class="col-sm-12">
                  <div class="card-box table-responsive">
           
            
            <a href="{{route('createkurikulum',[$prodi_id,$masterkurikulum_id])}}" class="btn btn-primary mt-1 mb-2">Tambah Data</a>
            <table id="#datatable-scroller" class="table table-striped table-bordered">
              <thead>
                <tr>
                  <th rowspan="2" class="align-middle">Semester</th>
                  <th rowspan="2" class="align-middle">Mata Kuliah</th>
                  <th rowspan="2" class="align-middle">Beban Studi</th>
                  <th colspan="3" class="align-middle text-center">Bentuk Pembelajaran</th>
                  <th rowspan="2" class="align-middle">Kategori Unsur</th>
                  <th rowspan="2" class="align-middle">Prasyarat</th>
                  <th colspan="4" class="align-middle text-center">Metode Pembelajaran</th>
                  <th rowspan="2" class="align-middle">Keterangan</th>
                  <th rowspan="2" class="align-middle">Aksi</th>
                </tr>
                <tr>
                  <th>Kuliah</th>
                  <th>Praktikum</th>
                  <th>Tutorial</th>
               
                  <th>Project Based Learning </th>
                  <th>Case Based Learning</th>
                  <th>Problem BasedLearning</th>
                  <th>Other</th>
                </tr>
              </thead>


              <tbody>
                {{-- @dd($kurikulum) --}}
                @foreach ($kurikulum as $item)
               {{-- @dd($item->prodi->nama_prodi) --}}
               
                <tr>
                  <td>{{$item->semester->semester}}</td>
                  <td>{{$item->matkul->nama_matkul}}</td>
                  <td>{{$item->beban_studi}}</td>

                      @php $bentukbobot = $item->bentuk_pembelajaran ? json_decode($item->bentuk_pembelajaran, true) : []; @endphp
                      @foreach ( $bentukbobot as $bobot)
                      <td>{{$bobot}}</td>
                      @endforeach
                      
                  <td>{{$item->kategoriunsur->kode}}</td>
                  <td>{{$item->prasyarat}}</td>
                  
                  <td class="text-center">
                     <input class="form-check-input" style="position:unset;opacity: 1;"type="checkbox" disabled="disabled"  id="flexCheckChecked"  {{ ($item->project_base_learning==1)?"checked":"" }}>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" style="position:unset;opacity: 1;" type="checkbox" disabled="disabled" id="flexCheckChecked" {{ ($item->case_base_learning==1)?"checked":"" }} >
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" style="position:unset;opacity: 1;" type="checkbox" disabled="disabled" id="flexCheckChecked" {{ ($item->problem_based_learning ==1)?"checked":"" }}>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" style="position:unset;opacity: 1;" type="checkbox" disabled="disabled" id="flexCheckChecked" {{ ($item->others ==1)?"checked":"" }}>
                  </td>
                  <td>{{ $item->keterangan }}</td>
                  <td> 
                    <a href="{{ route('strukturkurikulum.edit',$item->id)}}" class="btn btn-primary position-relative btn-sm" ><i class="fa fa-pencil"></i></i></a>
                    <form action="{{ route('strukturkurikulum.destroy',$item->id) }}" method="POST" class="d-inline">
                      @csrf
                      @method('delete')
                      <button type="submit" class="btn btn-danger border-0" ><i class="fa fa-close"></i></button>
                  </form>
                  </td>
                </tr>
                 
                 @endforeach
                      
              </tbody>
            </table>

            
          </div>
        </div>
      
    </div>
        </div>
      </div>

    </div>

  </div>
  <br />

  
</div>
<!-- /page content -->
@endsection
