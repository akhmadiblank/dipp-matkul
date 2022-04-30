@extends('admin.layout')
@section('title')
    Data Fakultas |
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
            <h2>Informasi Data fakultas</h2>
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
          <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="">Tambah Data</button>
          @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
          @endif
          <table class="table table-hover">
            <thead>
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Kode Fakultas</th>
                  <th scope="col">Nama Fakultas</th>
                  <th scope="col" class="">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($faculties as $faculty )
                <tr>
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $faculty->kode_fakultas }}</td>
                  <td>{{ $faculty->nama_fakultas }}</td>
                  <td class="d-flex align-items-center">
                    <a href="" class="badge badge-primary mx-1">Detail</a>
                    <a href="{{ route('faculties.update',$faculty->kode_fakultas) }}" class="badge badge-success mx-1">Update</a>
                    <form action="{{ route('faculties.destroy',$faculty->kode_fakultas) }}" method="POST" class="">
                      @csrf
                      @method('delete')
                      <button type="submit" class="badge badge-danger">Delete</button>
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
          </table>
      </div>

    </div>

  </div>
  <br />

  
</div>
{{-- modal add data --}}
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Fakultas</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <form action="{{route('faculties.store')}}" method="POST">
          @csrf
          <div class="mb-3">
            <label for="kode_fakultas" class="col-form-label">Kode Fakultas</label>
            <input type="text" class="form-control @error('kode_fakultas') is-invalid @enderror" id="kode_fakultas" name="kode_fakultas" value="{{old('kode_fakultas')}}">
            @error('kode_fakultas')
            <div class="invalid-feedback">{{ $message }}</div>
            @enderror
          </div>
          <div class="mb-3">
            <label for="nama_fakultas" class="col-form-label">Nama Fakultas</label>
            <input type="text" class="form-control" id="nama_fakultas" name="nama_fakultas">
          </div>
        
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        <button type="submit" class="btn btn-primary">Add</button>
      </div>
    </form>
    </div>
  </div>
</div>
<!-- /page content -->
@endsection
