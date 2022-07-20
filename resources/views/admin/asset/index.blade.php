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
              <h2>MANAGEMEN ASET</h2>
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
              <a href="{{ route('asset.create') }}" class="btn btn-primary mb-3">TAMBAH DATA</a>
              <a href="{{ route('assetsExport') }}" class="btn btn-success mb-3">EXPORT DATA</a>
              <a href="" class="btn btn-success mb-3" data-bs-toggle="modal" data-bs-target="#importmodal">IMPORT DATA</a>
              {{-- <form action="/import" method="post" enctype="multipart/form-data">
                @csrf
                <div class="input-group mb-3">
                    <input type="file" name="file" class="form-control" placeholder="Recipient's username" aria-label="Recipient's username" aria-describedby="button-addon2">
                    <button class="btn btn-primary" type="submit" id="button-addon2">Import</button>
                </div>
            </form> --}}
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif
              <div style="overflow:scroll;">
                <table id="datatable" class="table table-striped table-bordered" style="width:100%">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Kode Barang</th>
                      <th>Nama Barang</th>
                      <th>Merk Barang</th>
                      <th>Tanggal Perolehan</th>
                      <th>Ruangan</th>
                      <th>Sumber Dana</th>
                      <th>Jumlah Barang</th>
                      <th>Harga Barang</th>
                      <th>Keterangan</th>
                      <th>Status</th>
                      <th class="text-center">aksi</th>
                    </tr>
                  </thead>
                  <tbody >
                    @foreach ($asset as $item )
                    <tr>
                      <th scope="row">{{ $loop->iteration }}</th>
                      <td>{{ $item->kode_barang }}</td>
                      <td>{{ $item->nama_barang }}</td>
                      <td>{{ $item->merk_barang }}</td>
                      <td>{{ $item->tanggal_perolehan }}</td>
                      <td>{{ $item->ruangan->nama_ruang }}</td>
                      <td>{{ $item->sumber_dana }}</td>
                      <td>{{ $item->jumlah_barang }}</td>
                      <td>@currency($item->harga_barang)</td>
                      <td>{{ $item->keterangan }}</td>
                      <td>{{ $item->status }}</td>
                      {{-- <td><img src="{{asset('storage/'.$item->foto_barang) }}" alt="" srcset=""></td> --}}
                      <td class="text-center">
                        <a href="{{ route('asset.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-gear"></i></i></button>
                        <a type="submit" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever={{ $item->foto_barang }}><i class="fa fa-eye"></i></a>
                        <form action="{{ route('asset.destroy',$item->id) }}" method="POST" class="d-inline">
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

              <div class="row mt-5">
                <div class="col-md-6">
                  <h2 class="text-center fw-bold pe-5">Denah dan Data Inventaris</h2>
                  <img class="ps-5" src="{{ URL::asset('images/DENAH1.png')}}" alt="" srcset="">
                </div>

                <div class="col-md-6 mt-4">

                  <h2>Nama ruangan</h2>
                  <ol class="list-group list-group-numbered">
                    @foreach ($ruangan as $item )
                    <li><a href="http://">{{ $item->nama_ruang }}</a></li>
                    @endforeach
                  </ol>
                </div>
              </div>

            </div>
          </div>
        </div>

      </div>
  </div>



<!-- Modal view foto barang-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Foto Barang</h5>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
        <picture class="show-image">
          <img width="750" height="400">
        </picture>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
        </div>
    </div>
  </div>
</div>
  {{-- end modal --}}

  {{-- modal import data asset --}}
  <form action="{{ route('assetsImport') }}" method="post" enctype="multipart/form-data">
    @csrf
    <div class="modal fade" id="importmodal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
      <div class="modal-dialog">
        <div class="modal-content">
          <div class="modal-header">
            <h5 class="modal-title" id="exampleModalLabel">IMPORT DATA ASSET</h5>
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
          </div>
          <div class="modal-body">
            <div class="input-group mb-3">
              <input type="file" name="file" class="form-control" aria-label="Recipient's username" aria-describedby="button-addon2">
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
  {{-- end modal import data asset --}}

<!-- /page content -->
@endsection
@push('scripts')

<script>

var exampleModal = document.getElementById('exampleModal')
exampleModal.addEventListener('show.bs.modal', function (event) {
  // Button that triggered the modal
  var button = event.relatedTarget
  // Extract info from data-bs-* attributes
  var recipient = button.getAttribute('data-bs-whatever')
  // If necessary, you could initiate an AJAX request here
  // and then do the updating in a callback.
  //
  // Update the modal's content.
  var modal_url_photo = exampleModal.querySelector('.show-image img')
  // console.log(recipient)
  modal_url_photo.src="storage/"+recipient;
  


})

// $(document).ready(function () {
//     $('#datatable').DataTable({
//         scrollX: true,
//     });
// });
</script>
  
@endpush
