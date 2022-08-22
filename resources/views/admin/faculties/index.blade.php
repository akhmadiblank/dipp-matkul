@extends('admin.manajemen_mata_kuliah.template.layout')
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
          <button type="button" class="btn btn-primary" onClick="create()">Tambah Data</button>
          @if (session('status'))
          <div class="alert alert-success">
              {{ session('status') }}
          </div>
          @endif
          <table class="table table-hover"  id="datatable" style="width:100%">
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
                    <a href="/filterByFaculty/id?id={{ $faculty->id }}" class="badge badge-primary mx-1">Detail</a>
                    <a href="#" class="badge badge-success mx-1" onClick="show({{ $faculty->id }})">Update</a>
                    <form action="{{ route('faculties.destroy',$faculty->id) }}" method="POST" class="">
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
<div class="modal fade" id="Modal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      
         
        
      
    
    </div>
  </div>
</div>




<!-- /page content -->
@endsection
@push('scripts')
      <script>  
      // $(document).ready(function(){
      // });
    //function untuk create data  
    function create(){
      $.get("{{ url('faculties/create')}}",{},function(data,status){
        $('#exampleModalLabel').html('Tambah Fakultas');
        $(".modal-content").html(data);
        $('#Modal').modal('show');
      });
      }

      //function ajax untuk store data 
      function store() {
            let form_faculties=$('#form_faculties');
            // var kode_fakultas = $("#kode_fakultas").val();
            // var nama_fakultas = $("#nama_fakultas").val();
            $.ajax({
                type: form_faculties.attr('method'),
                url: form_faculties.attr('action'),
                data: form_faculties.serialize,
                success: function(data) {
                  console.log('submission has successfull')
                  $(".btn-close").click();
                    //read()
                }
            });
        }

        // Untuk modal halaman edit show
        function show(id) {
            $.get("{{ url('show') }}/" + id, {}, function(data, status) {
            // $.get("{{route('faculties.show',1)}}", {}, function(data, status) {
              $(".modal-content").html(data);
              $('#Modal').modal('show');
            });
        }
        //function ajax untuk update
        function update() {
            let form_faculties=$('form_faculties_edit');
            $.ajax({
                type: form_faculties.attr('method'),
                url: form_faculties.attr('action'),
                data: form_faculties.serialize,
                success: function(data) {
                  console.log('submission has successfull')
                  $(".btn-close").click();
                    //read()
                }
            });
        }

        
        // untuk proses update data
        // function update(id) {
        //     var kode = $("#kode_fakultas").val();
        //     var nama = $("#nama_fakultas").val();
        //     $.ajax({
        //         type: "get",
        //         url: "{{ url('facultyupdate') }}/" + id,
        //         data: ["name=" + name,"kode="+kode]
        //         success: function(data) {
        //             $(".btn-close").click();
        //             read()
        //         }
        //     });
        // }



      
      </script>  
@endpush
