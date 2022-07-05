@extends('admin.layout')
@section('title')
    Form Tambah Data Metode Pembelajaran
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
              <h2>CREATE DATA METODE PEMBELAJARAN FAKULTAS KEDOKTERAN GIGI</h2>
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
            <form action="{{ route('metode.store') }}" method="post">
                @csrf
                {{-- <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Program Studi</label>
                  <div class="col-md-9 col-sm-9 ">
                    <select class="form-control" name="prodi">
                      <option>Choose option</option>
                      @foreach ($fakultas as $prodi)
                      <option value="{{ $prodi->id}}">{{ $prodi->nama_prodi }}</option>
                      @endforeach
                    </select>
                  </div>
                </div> --}}

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Nama Mata Kuliah</label>
                  <div class="col-md-9 col-sm-9 ">

                    <select class="form-control"  name="matkul">
                      <option>Choose option</option>
                      @foreach ($fakultas as $prodi )
                        @foreach ( $prodi->matkul as $matkul )
                          <option value="{{ $matkul->id }}">{{ $matkul->nama_matkul }}</option>
                        @endforeach
                      @endforeach
                      
                    </select>
                  </div>
                </div>
                
                <div class="form-group row">
                  <label class="col-md-3 col-sm-3  control-label">Metode Pembelajaran
                    <br>
                    <small class="text-navy">silahkan centang yang sesuai</small>
                  </label>

                  <div class="col-md-9 col-sm-9 ">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="project_based_learning" value="1"> Project Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat"  name="case_base_learning" value="1"> Case Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="collaborative_learning" value="1"> Collaborative Learning
                      </label>
                    </div>
                  
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Keterangan</span>
                  </label>
                  <div class="col-md-9 col-sm-9 ">
                    <textarea class="form-control" rows="3" placeholder="keterangan" name="keterangan"></textarea>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Tambah</button>
            </form>
        </div>
  
      </div>
  
    </div>
    <br />
  
    
  </div>
  <!-- /page content -->

@endsection