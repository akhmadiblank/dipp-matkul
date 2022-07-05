@extends('admin.manajemen_mata_kuliah.template.layout')
@section('title')
    Data Program Studi
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
            <h2>Informasi Data Program Studi</h2>
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

          <div>
            <a href="{{route('prodi.create')}}" class="btn btn-primary mt-1 mb-2">Tambah data Baru</a>
            <table class="table table-hover"  id="datatable" style="width:100%">
                <thead>
                  <tr>
                    <th scope="col">#</th>
                    <th scope="col">Fakultas</th>
                    <th scope="col">Kode Program Studi</th>
                    <th scope="col">Nama Program Studi</th>
                    <th scope="col" class="">Action</th>
                  </tr>
                </thead>
                <tbody>
                  @foreach ($prodies as $prodi )
                  {{-- @dd( $prodi->faculty->nama_fakultas ) --}}
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $prodi->faculty->nama_fakultas }}</td>
                    <td>{{ $prodi->kode_prodi }}</td>
                    <td>{{ $prodi->nama_prodi }}</td>
                    <td class="d-flex align-items-center">
                      <a href="" class="badge badge-primary mx-1">Detail</a>
                      <a href="{{ route('prodi.edit',$prodi->id)}}" class="badge badge-success mx-1">Update</a>
                      <form action="{{ route('prodi.destroy',$prodi->id) }}" method="POST" class="">
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

  </div>
  <br />

  
</div>
<!-- /page content -->
@endsection
@push('scripts')
<script>
  
//   $(document).ready( function () {
//     $('#datatable').DataTable();
// } );
</script>
@endpush