@extends('admin.layout')
@section('title')
    Form Update Program Studi
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
              <h2>UPDATE DATA PROGRAM STUDI</h2>
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
            {{-- @dd($prodi) --}}
            <form action="{{ route('prodi.update',$prodi->id) }}" method="post">
                @method('put')
                @csrf
                <div class="form-group row">
                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="faculty_id">
                      @foreach ($faculties as $faculty )
                      @if (old('faculty_id',$prodi->faculty_id)==$faculty->id)
                      <option selected value="{{ $faculty->id }}">{{ $faculty->nama_fakultas }}</option>
                      @else
                      <option value="{{ $faculty->id }}">{{ $faculty->nama_fakultas }}</option>
                      @endif
                      @endforeach
                    </select>
                     </div>
                </div>
                <div class="form-group row">
                    <label for="kode_prodi" class="col-sm-2 col-form-label">Kode Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi" name="kode_prodi" value="{{old('kode_prodi',$prodi->kode_prodi)}}">
                      @error('kode_prodi')
                        <div id="emailFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror 
                    </div>
                </div>
                <div class="form-group row">
                    <label for="jurusan" class="col-sm-2 col-form-label">Nama Program Studi</label>
                    <div class="col-sm-10">
                        <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi" name="nama_prodi" value="{{old('nama_prodi',$prodi->nama_prodi)}}">
                        @error('nama_prodi')
                        <div id="jurusanFeedback" class="invalid-feedback">
                            {{$message}}
                        </div>
                        @enderror 
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