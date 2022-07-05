@extends('admin.layout')
@section('title')
    Dashboard |
@endsection
@section('content')

<!-- page content -->
<div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12">
          <div class="x_panel">
            <div class="x_title">
              <h2>FORM TAMBAH DATA</h2>
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
            {{-- <div class="x_content"> --}}
            <form action="{{ route('jadwal.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="mb-3">
                    <label for="nama_kegiatan" class="form-label">Nama Kegiatan</label>
                    <input  class="form-control @error('nama_kegiatan')is-invalid @enderror" id="nama_kegiatan" name="nama_kegiatan" style="border-radius: 7px" value ="{{ old('nama_kegiatan') }}">
                    @error('nama_kegiatan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
          
                  </div>
                <div class="mb-3">
                    <label for="instansi" class="form-label">Instansi</label>
                    <input  class="form-control @error('instansi')is-invalid @enderror" id="instansi" name="instansi" style="border-radius: 7px" value ="{{ old('instansi') }}">
                    @error('instansi')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                <div class="mb-3">
                    <label for="pj_kegiatan" class="form-label">Penanggung Jawab Kegiatan</label>
                    <input  class="form-control @error('pj_kegiatan')is-invalid @enderror" id="pj_kegiatan" name="pj_kegiatan" style="border-radius: 7px" value ="{{ old('pj_kegiatan') }}">
                    @error('pj_kegiatan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                <div class="row mb-3">
                  <div class="col-md-4 col-sm-3 ">
                  <label class="form-label">Tanggal Kegiatan<span class="required">*</span></label>
                  <input id="birthday" class="date-picker form-control @error('tanggal_kegiatan')is-invalid @enderror" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" style="border-radius: 7px" name="tanggal_kegiatan" value ="{{ old('tanggal_kegiatan') }}">
                  <script>
                      function timeFunctionLong(input) {
                          setTimeout(function() {
                              input.type = 'text';
                          }, 30000);
                      }
                  </script>
                   @error('tanggal_kegiatan')
                   <div id="validationServer03Feedback" class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                  </div>

                  <div class="col-md-4">
                    <label for="waktu_mulai">Waktu Mulai:</label>
                    <input class="form-control @error('waktu_mulai')is-invalid @enderror" type="time" id="waktu_mulai" name="waktu_mulai" style="border-radius: 7px" value ="{{ old('waktu_mulai') }}">
                    @error('waktu_mulai')
                   <div id="validationServer03Feedback" class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                  </div>

                  <div class="col-md-4">
                    <label for="waktu_selesai">Waktu Selesai:</label>
                    <input class="form-control @error('waktu_mulai')is-invalid @enderror" type="time" id="waktu_selesai" name="waktu_selesai"  style="border-radius: 7px" value ="{{ old('waktu_selesai') }}">
                    @error('waktu_selesai')
                   <div id="validationServer03Feedback" class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                  </div>

                </div> 
                <div class="form-group row">
                  <div class="col-md-6 col-sm-6">
                    <label class="form-label control-label">Ruangan</label>
                    <select class="form-control @error('ruangan')is-invalid @enderror" style="border-radius: 7px" name="ruangan">
                      <option>Choose option</option>
                      @foreach ($ruangan as $item )
                      <option value="{{ $item->nama_ruang }}">{{ $item->nama_ruang }}</option>
                      @endforeach
                    </select>
                    @error('ruangan')
                   <div id="validationServer03Feedback" class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                  </div>

                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Upload Dokumen</label>
                      <input class="form-control" type="file" id="formFile" style="border-radius: 7px" name="surat_peminjaman">
                      <small class="required">*Upload File Dengan Format.pdf</small>
                      @error('surat_peminjaman')
                      <div id="validationServer03Feedback" class="invalid-feedback">
                        {{ $message }}
                      </div>
                      @enderror
                    </div>
                  </div> 
                </div>

                <div class="row d-flex justify-content-center">
                  
                    <button type="submit" class="btn btn-primary col-md-5 col-sm-5 mr-5" style="border-radius: 7px;height:50px;">Tambah</button>
                    <button type="submit" class="btn btn-danger col-md-5 col-sm-5 ml-5" style="border-radius: 7px">cancel</button>
                  
                </div>

            </form>
            

              

       
          </div>
        </div>

      </div>


 


  
</div>
<!-- /page content -->
@endsection