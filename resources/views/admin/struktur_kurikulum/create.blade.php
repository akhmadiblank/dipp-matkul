@extends('admin.manajemen_mata_kuliah.template.layout')
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
              <h2>Struktur Kurikulum</h2>
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
            <form action="{{ route('strukturkurikulum.store') }}" method="post">
                @csrf
                <input type="hidden"  name="prodi_id" value="{{ $prodi_id }}">
                
                <input type="hidden"  name="masterkurikulum_id" value="{{ $masterkurikulum_id }}">

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Semester</label>
                  <div class="col-md-9 col-sm-9 ">
                    <select class="form-control" name="semester_id">
                      <option>Choose option</option>
                      @foreach ($semester as $item)
                      <option value="{{ $item->id}}">{{ $item->semester }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Nama Mata Kuliah</label>
                  <div class="col-md-9 col-sm-9 ">

                    <select class="form-control"  name="matkul_id">
                      <option>Choose option</option>
                      @foreach ($matkul as $item )
                        <option value="{{ $item->id }}">{{ $item->nama_matkul }}</option>
                      @endforeach
                    </select>
                  </div>
                </div>

                <hr>
                 
                <div class="row form-group">
                  <label class="control-label col-md-3 col-sm-3 ">Beban Studi</span>
                  </label>
                  <div class="col-md-3 col-sm-3 ">
                    <input  class="form-control @error('beban_studi')is-invalid @enderror" id="beban_studi" name="beban_studi" style="border-radius: 7px" value ="{{ old('beban_studi') }}">
                    @error('beban_studi')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>
                
                
                <div class="row form-group mb-1">
                  <div class="col-sm-3 col-md-3 mt-3"><label class="control-label col-md-3 col-sm-">Bentuk Pembelajaran</div>
                  <div class="col-sm-3 col-md-3">
                    <label for="merk_barang" class="form-label">Kuliah</label>
                    <input  class="form-control @error('merk_barang')is-invalid @enderror" id="merk_barang" name="bentuk_pembelajaran[]" style="border-radius: 7px" value ="{{ old('merk_barang') }}">
                    @error('bentuk_pembelajaran')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <label for="praktek" class="form-label">Praktek</label>
                    <input  class="form-control @error('praktek')is-invalid @enderror" id="praktek" name="bentuk_pembelajaran[]" style="border-radius: 7px" value ="{{ old('praktek') }}">
                    @error('praktek')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-md-3 col-sm-3">
                    <label for="tutorial" class="form-label">Tutorial</label>
                    <input  class="form-control @error('tutorial')is-invalid @enderror" id="tutorial" name="bentuk_pembelajaran[]" style="border-radius: 7px" value ="{{ old('tutorial') }}">
                    @error('tutorial')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                    </div>
                 </div>

                
                
                <div class="form-group row mt-3">
                  <label class="col-md-3 col-sm-3  control-label">Metode Pembelajaran
                    <br>
                    <small class="text-navy">silahkan centang yang sesuai</small>
                  </label>

                  <div class="col-md-9 col-sm-9 ">
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="project_base_learning" value="1"> Project Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat"  name="case_base_learning" value="1"> Case Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="problem_based_learning" value="1"> Problem Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="others" value="1"> Others
                      </label>
                    </div>
                  
                  </div>
                </div>
                <hr>

                <div class="row form-group">
                  <label class="control-label col-md-3 col-sm-3 ">Prasyarat</span>
                  </label>
                  <div class="col-md-9 col-sm-9 ">
                    <textarea class="form-control" rows="3" placeholder="prasyarat" name="prasyarat"></textarea>
                    @error('prasyarat')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                
                <div class="form-group row">
                  <label for="fakultas" class="col-md-3 col-form-label">Kategori Unsur</label>
                  <div class="col-md-9">
                    <select class="js-example-responsive" name="kategoriunsurs[]" multiple="multiple" style="width:100%;">
                      @foreach ( $kategori_unsurs as $item )
                      <option value="{{ $item->id }}">{{ $item->kode }}</option>s
                      @endforeach
                    </select>
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
@push('scripts')
  <script>
    $(document).ready(function() {
    $('.js-example-responsive').select2({
      width: 'resolve'
    });
});
  </script>
@endpush
