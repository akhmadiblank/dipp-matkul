@extends('admin.manajemen_mata_kuliah.template.layout')
@section('title')
    Form Tambah Program Studi
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
              <h2>CREATE DATA PROGRAM STUDI</h2>
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
            <form action="{{ route('prodi.store') }}" method="post">
                @csrf
                <div class="form-group row">
                    <label for="fakultas" class="col-sm-2 col-form-label">Fakultas</label>
                    <div class="col-sm-10">
                    <select class="form-select" name="faculty_id">
                      @foreach ($faculties as $faculty )
                      @if (old('faculty_id')==$faculty->id)
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
                        <input type="text" class="form-control @error('kode_prodi') is-invalid @enderror" id="kode_prodi" name="kode_prodi" value="{{old('kode_prodi')}}">
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
                        <input type="text" class="form-control @error('nama_prodi') is-invalid @enderror" id="nama_prodi" name="nama_prodi" value="{{old('nama_prodi')}}">
                        @error('nama_prodi')
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
                    @if (old('jenjang_id')==$item->id)
                    <option selected value="{{ $item->id }}">{{$item->nama }}</option>
                    @else
                    <option value="{{ $item->id }}">{{$item->nama }}</option>
                    @endif
                    @endforeach
                   </select>
                   </div>
                </div>
                <div class="form-group row">
                  <label for="fakultas" class="col-md-2 col-form-label">Akreditasi</label>
                  <div class="col-md-10">
                    <select class="js-example-responsive" name="akreditasi[]" multiple="multiple" style="width:100%;">
                      @foreach ( $akreditasis as $item )
                      <option value="{{ $item->id }}">{{ $item->kode }}</option>s
                      @endforeach
                    </select>
                   </div>
                </div>
                <div class="form-group row">
                  <label for="fakultas" class="col-md-2 col-form-label">Kurikulum</label>
                  <div class="col-md-10">
                    <select class="js-example-responsive" name="masterKurikulum_id[]" multiple="multiple" style="width:100%;">
                      @foreach ( $masterKurikulum as $item )
                      <option value="{{ $item->id }}">{{ $item->tahun_kurikulum }}</option>
                      @endforeach
                    </select>
                   </div>
                </div>

               
                {{-- <div class="form-group row">
                  <label for="fakultas" class="col-sm-2 col-form-label">Kurikulum</label>
                  <div class="col-sm-10">
                  <select class="form-select" name="masterKurikulum_id">
                    <option selected value="">Choose option</option>
                    @foreach ($masterKurikulum as $item )
                    @if (old('masterKurikulum_id')==$item->id)
                    <option selected value="{{ $item->id }}">{{$item->tahun_kurikulum }}</option>
                    @else
                    <option value="{{ $item->id }}">{{$item->tahun_kurikulum }}</option>
                    @endif
                    @endforeach
                   </select>
                   </div>
                </div> --}}

                <button type="submit" class="btn btn-primary"> Tambah</button>

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