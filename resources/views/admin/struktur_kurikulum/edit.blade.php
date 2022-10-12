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
              <h2>Edit Struktur Kurikulum</h2>
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
            {{-- @dd($param) --}}
            <form action="{{ route('strukturkurikulum.update',$param->id) }}" method="post">
              @method('put')
                @csrf
                <input type="hidden"  name="prodi_id" value="{{ $param->prodi_id }}">
                
                <input type="hidden"  name="masterkurikulum_id" value="{{ $param->masterkurikulum_id }}">

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Semester</label>
                  <div class="col-md-9 col-sm-9 ">
                    <select class="form-control" name="semester_id">
                      <option>Choose option</option>
                      @foreach ($semester as $item)
                      @if (old('semester_id',$item->id)==$param->semester_id)
                      <option selected value="{{ $item->id}}">{{ $item->semester }}</option>
                      @else
                      <option value="{{ $item->id}}">{{ $item->semester }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Nama Mata Kuliah</label>
                  <div class="col-md-9 col-sm-9 ">

                    <select class="form-control" id="matkul_id" name="matkul_id">
                      <option>Choose option</option>
                      @foreach ($matkul as $item )
                      @if (old('matkul_id',$item->id)==$param->matkul_id)
                      <option selected value="{{ $item->id}}">{{ $item->nama_matkul }}</option>
                      @else
                      <option value="{{ $item->id }}">{{ $item->nama_matkul }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div>

                <hr>
                 
                <div class="row form-group">
                  <label class="control-label col-md-3 col-sm-3 ">Beban Studi</span>
                  </label>
                  <div class="col-md-3 col-sm-3 ">
                    <input  class="form-control @error('beban_studi')is-invalid @enderror" id="beban_studi" name="beban_studi" style="border-radius: 7px" value ="{{ old('beban_studi',$param->beban_studi) }}">
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
                    <input  class="form-control @error('bentuk_pemebelajaran[]')is-invalid @enderror" id="Kuliah" name="bentuk_pembelajaran[]" style="border-radius: 7px" value ="{{$param->bentuk_pembelajaran[2]}}">
                    @error('bentuk_pembelajaran')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <label for="praktek" class="form-label">Praktek</label>
                    <input  class="form-control @error('bentuk_pemebelajaran[]')is-invalid @enderror" id="Praktek" name="bentuk_pembelajaran[]" style="border-radius: 7px" value ="{{$param->bentuk_pembelajaran[7]}}">
                    @error('bentuk_pemebelajaran[]')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-md-3 col-sm-3">
                    <label for="tutorial" class="form-label">Tutorial</label>
                    <input  class="form-control @error('bentuk_pembelajaran[]')is-invalid @enderror" id="tutorial" name="bentuk_pembelajaran[]" style="border-radius: 7px" value ="{{ $param->bentuk_pembelajaran[12]}}">
                    @error('bentuk_pemebelajaran[]')
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
                        <input type="checkbox" class="flat" name="project_base_learning" {{ ($param->project_base_learning==1)?"checked":"" }}> Project Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat"  name="case_base_learning" {{ ($param->case_base_learning==1)?"checked":"" }}> Case Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="problem_based_learning" {{ ($param->problem_based_learning==1)?"checked":"" }}> Problem Based Learning
                      </label>
                    </div>
                    <div class="checkbox">
                      <label>
                        <input type="checkbox" class="flat" name="others" {{ ($param->others==1)?"checked":"" }}> Others
                      </label>
                    </div>
                  
                  </div>
                </div>
                <hr>

                <div class="row form-group">
                  <label class="control-label col-md-3 col-sm-3 ">Prasyarat</span>
                  </label>
                  <div class="col-md-9 col-sm-9 ">
                    <textarea class="form-control" rows="3" placeholder="prasyarat" name="prasyarat">{{ $param->prasyarat }}</textarea>
                    @error('prasyarat')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                
                {{-- <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Kategori Unsur</label>
                  <div class="col-md-9 col-sm-9 ">

                    <select class="form-control"  name="kategoriunsur_id">
                      <option>Choose option</option>
                      @foreach ($kategori_unsurs as $item )
                      @if (old('matkul_id',$item->id)==$param->kategoriunsur_id)
                      <option selected value="{{ $item->id }}">{{ $item->kode }}</option>
                      @else
                      <option value="{{ $item->id }}">{{ $item->kode }}</option>
                      @endif
                      @endforeach
                    </select>
                  </div>
                </div> --}}

                <div class="form-group row">
                  <label for="fakultas" class="col-md-3 col-form-label">Kategori Unsur</label>
                  <div class="col-md-9">
                    <select class="js-example-responsive" name="kategoriunsurs[]" multiple="multiple" style="width:100%;">
                      {{-- <option selected value="">Choose option</option> --}}
                      @foreach ( $kategori_unsurs as $item )
                     <option value="{{ $item->id }}"
                      @foreach ($param->kategoriunsurs as $value )
                        @if ($item->id==$value->id)
                          selected
                        @endif
                        
                      @endforeach>{{ $item->kode }}</option>
                      @endforeach
                    </select>
                   </div>
                </div>

                <div class="form-group row">
                  <label class="control-label col-md-3 col-sm-3 ">Keterangan</span>
                  </label>
                  <div class="col-md-9 col-sm-9 ">
                    <textarea class="form-control" rows="3" placeholder="keterangan" name="keterangan">{{ $param->keterangan }}</textarea>
                  </div>
                </div>

                <button type="submit" class="btn btn-primary">Update</button>
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
    $("select").select2();
});
  </script>
@endpush
