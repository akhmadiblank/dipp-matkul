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

          <a href="{{route('matkul.create')}}" class="btn btn-primary mt-1 mb-2">Tambah data Baru</a>
          {{-- @dd($matkuls) --}}
          <table class="table table-hover"  id="datatable" style="width:100%">
            
              <thead>
                <tr>
                  <th scope="col">#</th>
                  <th scope="col">Program Studi</th>
                  <th scope="col">Kode Mata Kuliah</th>
                  <th scope="col">Nama Mata Kuliah</th>
                  <th scope="col" class="">Action</th>
                </tr>
              </thead>
              <tbody>
                @foreach ($matkuls as $matkul )
                {{-- @dd( $prodi->faculty->nama_fakultas ) --}}
                <tr> 
                  <th scope="row">{{ $loop->iteration }}</th>
                  <td>{{ $matkul->prodi->nama_prodi }}</td>
                  <td>{{ $matkul->kode_matkul }}</td>
                  <td>{{ $matkul->nama_matkul }}</td>
                  <td class="d-flex align-items-center">
                    <a href="" class="badge badge-primary mx-1">Detail</a>
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
      </div>

    </div>

  </div>
  <br />

  
</div>
<!-- /page content -->
@endsection