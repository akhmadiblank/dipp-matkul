@extends('admin.manajemen_mata_kuliah.template.layout')
@section('title')
    Data Mata Kuliah
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
            <h2>Informasi Data Mata Kuliah</h2>
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
          
          @if (session('success'))
          <div class="alert alert-success" role="alert">
            {{ session('success') }}
          </div>
          @endif
          <div class="d-flex justify-content-between align-items-center">
            <a href="{{route('matkul.create')}}" class="btn btn-primary mt-1 mb-2"><span class="glyphicon glyphicon-plus"></span>Tambah data</a>
            <a href="/matkuls/export/" class="btn btn-success mt-1 mb-2"><span class="
            glyphicon glyphicon-cloud-download" aria-hidden="true"></span>
            Export</a>
          <a href="" class="btn btn-success mt-1 mb-2" data-bs-toggle="modal" data-bs-target="#importmodal"> <span class="glyphicon glyphicon-cloud-upload" aria-hidden="true"></span> Import</a>
          <div class="col-8 mt-2">
            <form action="/matkul" method="get">
              <div class="input-group">
                <input type="text" class="form-control" placeholder="Search..." name="search" value="{{ request('search') }}">
                <button class="btn btn-danger" type="submit" id="btn-search">Search</button>
              </div>
            </form>
          </div>
        </div>

          @if ($matkuls->count())
          <table class="table table-hover">
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Mata Kuliah</th>
                  <th scope="col">Nama Mata Kuliah</th>
                  <th scope="col">Mata Kuliah Jenjang</th>
                  <th scope="col" class="">Action</th>
                </tr>
              </thead>
              <tbody>
                @php
                  $skipped = ($matkuls->currentPage() * $matkuls->perPage()) - $matkuls->perPage();
                @endphp
                
                @foreach ($matkuls as $matkul )
                {{-- @dd( $prodi->faculty->nama_fakultas ) --}}
                <tr> 
                  <th scope="row">{{ $loop->iteration+$skipped }}</th>
                  <td>{{ $matkul->kode_matkul }}</td>
                  <td>{{ @$matkul->nama_matkul }}</td>
                  <td>{{ $matkul->jenjang->nama }}</td>
                  <td class="d-flex align-items-center">
                    <a href="{{ route('matkul.edit',$matkul->id)}}" class="badge badge-success mx-1">Update</a>
                    <form action="{{ route('matkul.destroy',$matkul->id) }}" method="POST" class="">
                      @csrf
                      @method('delete')
                      <button type="submit" class="badge badge-danger">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
            </table>
            {{ $matkuls->perPage()}}  From {{ $matkuls->total() }} Data
          </div>
          @else
          <p class="text-center fs-4 mt-5">Mata Kuliah Tidak Di Ketemukan</p>
          @endif

          <div class="d-flex justify-content-center">
            {{ $matkuls->links() }}
          </div>
        </div>
        
  </div>
  <br />

  
</div>

 {{-- modal import data matkul --}}
 <form action="{{ route('ImportMatkuls') }}" method="post" enctype="multipart/form-data">
  @csrf
  <div class="modal fade" id="importmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">IMPORT DATA MATA KULIAH</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="input-group mb-3">
            <input type="file" name="file" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2" required>
          </div>
          <small class="required">*Upload File Dengan .xlsx</small>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary">Import</button>
        </div>
      </div>
    </div>
  </div>

</form>
{{-- end modal import data matkul --}}
<!-- /page content -->
@endsection