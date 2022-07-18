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
            <form action="{{ route('asset.store') }}" method="post" enctype="multipart/form-data">
              @csrf
                <div class="row form-group">
                  <div class="col-sm-6 col-md-6">
                    <label for="kode_barang" class="form-label">Kode Barang</label>
                    <input  class="form-control @error('kode_barang')is-invalid @enderror" id="kode_barang" name="kode_barang" style="border-radius: 7px" value ="{{ old('kode_barang') }}">
                    @error('kode_barang')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <label for="sumber_dana" class="form-label">Sumber Dana</label>
                    <input  class="form-control @error('sumber_dana')is-invalid @enderror" id="sumber_dana" name="sumber_dana" style="border-radius: 7px" value ="{{ old('sumber_dana') }}">
                    @error('sumber_dana')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-sm-6 col-md-6">
                    <label for="nama_barang" class="form-label">Nama Barang</label>
                    <input  class="form-control @error('nama_barang')is-invalid @enderror" id="nama_barang" name="nama_barang" style="border-radius: 7px" value ="{{ old('nama_barang') }}">
                    @error('nama_barang')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-6 col-md-6">
                    <label for="jumlah_barang" class="form-label">Jumlah Barang</label>
                    <input  class="form-control @error('jumlah_barang')is-invalid @enderror" id="jumlah_barang" name="jumlah_barang" style="border-radius: 7px" value ="{{ old('jumlah_barang') }}">
                    @error('jumlah_barang')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-sm-3 col-md-3">
                    <label for="merk_barang" class="form-label">Merk Barang</label>
                    <input  class="form-control @error('merk_barang')is-invalid @enderror" id="merk_barang" name="merk_barang" style="border-radius: 7px" value ="{{ old('merk_barang') }}">
                    @error('merk_barang')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                  <div class="col-sm-3 col-md-3">
                    <label for="harga_barang" class="form-label">Harga Satuan Barang</label>
                    <input  class="form-control @error('harga_barang')is-invalid @enderror" id="harga_barang" name="harga_barang" style="border-radius: 7px" value ="{{ old('harga_barang') }}">
                    @error('harga_barang')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>

                  <div class="col-md-6 col-sm-6">
                    <label class="form-label control-label">status</label>
                    <select class="form-control @error('status')is-invalid @enderror" style="border-radius: 7px" name="status">
                      <option>Choose option</option>
                     
                      <option value="baik">Baik</option>
                      <option value="rusak ringan">Rusak Ringan</option>
                      <option value="rusak berat">Rusak Berat</option>
                      <option value="dihapus">Dihapus</option>
                      <option value="dilimpahkan">Dilimpahkan</option>
                      <option value="dihibahkan">Dihibahkan</option>
                   
                    </select>
                    @error('status')
                   <div id="validationServer03Feedback" class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                  </div>
                </div>

                <div class="row form-group">
                  <div class="col-md-4 col-sm-3 ">
                    <label class="form-label">Tanggal Perolehan<span class="required">*</span></label>
                    <input id="birthday" class="date-picker form-control @error('tanggal_perolehan')is-invalid @enderror" placeholder="dd-mm-yyyy" type="text" required="required" type="text" onfocus="this.type='date'" onmouseover="this.type='date'" onclick="this.type='date'" onblur="this.type='text'" onmouseout="timeFunctionLong(this)" style="border-radius: 7px" name="tanggal_perolehan" value ="{{ old('tanggal_perolehan') }}">
                    <script>
                        function timeFunctionLong(input) {
                            setTimeout(function() {
                                input.type = 'text';
                            }, 30000);
                        }
                    </script>
                     @error('tanggal_perolehan')
                     <div id="validationServer03Feedback" class="invalid-feedback">
                       {{ $message }}
                     </div>
                     @enderror
                    </div>

                  <div class="col-sm-9 col-md-8">
                    <label for="keterangan" class="form-label">Keterangan</label>
                    <input  class="form-control @error('keterangan')is-invalid @enderror" id="keterangan" name="keterangan" style="border-radius: 7px" value ="{{ old('keterangan') }}">
                    @error('keterangan')
                    <div id="validationServer03Feedback" class="invalid-feedback">
                      {{ $message }}
                    </div>
                    @enderror
                  </div>
                </div>

                <div class="form-group row">
                  <div class="col-md-6 col-sm-6">
                    <label class="form-label control-label">Ruangan</label>
                    <select class="form-control @error('ruangan_id')is-invalid @enderror" style="border-radius: 7px" name="ruangan_id">
                      <option>Choose option</option>
                      @foreach ($ruangan as $item )
                      <option value="{{ $item->id}}">{{ $item->nama_ruang }}</option>
                      @endforeach
                    </select>
                    @error('ruangan_id')
                   <div id="validationServer03Feedback" class="invalid-feedback">
                     {{ $message }}
                   </div>
                   @enderror
                  </div>

                  <div class="col-sm-6 col-md-6">
                    <div class="mb-3">
                      <label for="formFile" class="form-label">Upload foto</label>
                      <input class="form-control" type="file" id="formFile" style="border-radius: 7px" name="foto_barang">
                      <small class="required">*Upload File Dengan Format .jpg,jpeg atau .png</small>
                      @error('foto_barang')
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