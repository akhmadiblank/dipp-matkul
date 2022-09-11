@extends('admin.manajemen_mata_kuliah.template.layout')
@section('title')
    Dashboard |
@endsection
@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
 
  <!-- /top tiles -->

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
     
      
        <div class="x_panel">
          <div class="x_title">
            <h2>Informasi Akademik : {{ @$filterByFaculty[0]->faculty->nama_fakultas}}</h2>
            <br>
            <h2></h2>

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
                     
            <table class="table table-hover"  id="datatable" style="width:100%">
              <thead>
                <tr>
                  <th rowspan="2" class="align-middle">No</th>
                  {{-- <th rowspan="2" class="align-middle">Fakultas</th> --}}
                  <th rowspan="2" class="text-center">Kode Prodi</th>
                  <th rowspan="2" class="align-middle text-center">Nama Prodi</th>
                  <th rowspan="2" class="align-middle text-center">Jenjang</th>
                  <th rowspan="2" class="align-middle text-center">Tahun Kurikulum</th>
                  {{-- <th rowspan="2" class="align-middle text-center">Aksi</th> --}}
                </tr>
                
              </thead>


              <tbody>
                @foreach ( $filterByFaculty as $item )
                <tr>
                    {{-- @dd($filterByFaculty) --}}
                  <td>{{ $loop->iteration }}</td>
                  {{-- <td>{{ $item->faculty->nama_fakultas  }}</td> --}}
                  <td class="text-center">{{ $item->kode_prodi}}</td>
                  <td class="text-center">{{ $item->nama_prodi}}</td>
                  <td class="text-center">{{$item->jenjang->nama}}</td>
                  <td class="text-center">
                    <div class="input-group-btn">
                      <button type="button" class="btn btn-success dropdown-toggle" data-toggle="dropdown" aria-expanded="true">Tahun Kurikulum<span class="caret"></span>
                      </button>
                      <ul class="dropdown-menu dropdown-menu-right" role="menu">
                        @foreach ($item->masterkurikulums as $masterkurikulum )
                        <li><a class="dropdown-item" href="{{ route('showkurikulum',['prodi_id'=>$item->id,'masterkurikulum_id'=>$masterkurikulum->id])}}">{{ $masterkurikulum->tahun_kurikulum }}</a></li>
                        @endforeach
                      </ul>
                    </div>
                   
                  </td>
                  {{-- <td class="text-center"><a href="{{ route('showkurikulum',$item->id)}}">tahun_kurikulum</a></td> --}}
                  
                  {{-- <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>  --}}
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
