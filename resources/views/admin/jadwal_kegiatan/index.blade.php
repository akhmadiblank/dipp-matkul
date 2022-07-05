@extends('admin.layout')
@section('title')
    Dashboard |
@endsection
@section('content')

<!-- page content -->
<div class="right_col" role="main">
      <div class="row">
        <div class="col-md-12 col-sm-12  ">
          <div class="x_panel">
            <div class="x_title">
              <h2>JADWAL KEGIATAN</h2>
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
            <div class="x_content">
              <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">TAMBAH DATA</a>
              
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif
          
              <table class="table table-striped table-bordered">
                <thead>
                  <tr>
                    <th>#</th>
                    <th>Nama Kegiatan</th>
                    <th>Instansi</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Waktu Mulai</th>
                    <th>Waktu Selesai</th>
                    <th>Tempat</th>
                    <th>PJ Kegiatan</th>
                    <th class="text-center">aksi</th>
                  </tr>
                </thead>
                <tbody >
                  @foreach ($jadwal as $item )
                  <tr>
                    <th scope="row">{{ $loop->iteration }}</th>
                    <td>{{ $item->nama_kegiatan }}</td>
                    <td>{{ $item->instansi }}</td>
                    <td>{{ $item->tanggal_kegiatan }}</td>
                    <td>{{ $item->waktu_mulai }}</td>
                    <td>{{ $item->waktu_selesai }}</td>
                    <td>{{ $item->ruangan }}</td>
                    <td>{{ $item->pj_kegiatan }}</td>
                    <td class="text-center">
                      <a href="{{ route('jadwal.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-gear"></i></i></button>
                      <a type="submit" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="fa fa-eye"></i></a>
                      <form action="{{ route('jadwal.destroy',$item->id) }}" method="POST" class="d-inline">
                        @csrf
                        @method('delete')
                        <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Apakah Kamu yakin?')"><i class="fa fa-close"></i></button>
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
  </div>

  {{-- modal --}}
  <!-- Button trigger modal -->

<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Surat Peminjaman</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <iframe src="{{ asset('storage/surat-peminjaman/7BR2mQupsR8gsHNQt8V0moVKXiIRLXlq3rLZDjeI.pdf') }}" width="750" height="400"></iframe>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
  {{-- end modal --}}
<!-- /page content -->
@endsection
