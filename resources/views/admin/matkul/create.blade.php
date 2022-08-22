@extends('admin.manajemen_mata_kuliah.template.layout')
@section('title')
    Form Tambah Mata Kuliah
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
              <h2>CREATE DATA MATA KULIAH</h2>
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
            <form action="{{ route('matkul.store') }}" method="post">
                @csrf
               
                <div class="form-group row">
                    <label for="kode_matkul" class="col-sm-2 col-form-label">Kode Mata Kuliah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_matkul') is-invalid @enderror" id="kode_matkul" name="kode_matkul" value="{{old('kode_matkul')}}">
                      @error('kode_matkul')
                        <div id="emailFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror 
                    </div>
                </div>
                
          
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Nama Mata Kuliah</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_matkul') is-invalid @enderror" id="nama_matkul" name="nama_matkul" value="{{old('nama_matkul')}}">
                        @error('nama_matkul')
                        <div id="jurusanFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror 
                    </div>
                </div>

                <div class="form-group row">
                  <label for="fakultas" class="col-sm-2 col-form-label">Jenjang</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="jenjang_id">
                    <option selected value="">Choose option</option>
                    @foreach ($jenjang as $item )
                  
                    <option value="{{ $item->id }}">{{$item->nama }}</option>
                 
                    @endforeach
                   </select>
                   </div>
                </div>
                 
                <button type="submit" class="btn btn-primary"> Tambah</button>

            </form>
        </div>
  
      </div>
  
    </div>
    <br />
  
    
  </div>
  <!-- /page content -->

@endsection