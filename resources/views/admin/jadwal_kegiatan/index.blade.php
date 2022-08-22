@extends('admin.layout')
@section('title')
    Dashboard |
@endsection
@push('styles')
<style>
.img-button{
  width:80%;
  /* height: 60%; */
}
@font-face{
    font-family: 'Digital-7';
    src:  url('fonts/digital-7.ttf') format('woff2'),   b ,g,mdrx
    url('digital-7.woff') format('woff');
}
.clockdate-wrapper {
    background: #d8de3d;  /* fallback for old browsers */
    background: -webkit-linear-gradient(to right, #d0c317, #a4a926);  /* Chrome 10-25, Safari 5.1-6 */
    background: linear-gradient(to right, #d0c317, #a4a926); /* W3C, IE 10+/ Edge, Firefox 16+, Chrome 26+, Opera 12+, Safari 7+ */
    padding:25px;
    /* max-width:550px; */
    width:100%;
    text-align:center;
    border-radius:5px;
    margin:0 auto;
  
}
#clock{
    font-family: Digital-7, 'sans-serif';
    font-size:60px;
    text-shadow:0px 0px 1px #fff;
    color:#fff;
}
#clock span {
    color: rgba(255, 255, 255, 0.8);
    text-shadow:0px 0px 1px #333;
    font-size:50px;
    position:relative;
    top:-5px;
    left:10px;
}
#date {
    letter-spacing:3px;
    font-size:14px;
    font-family:arial,sans-serif;
    color:#fff;
}

</style>
  
@endpush
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
              <div id="clockdate" class="mb-5">
                <div class="clockdate-wrapper">
                  <div id="clock"></div>
                  <div id="date"></div>
                </div>
              </div>

              <div id="room-button" class="mb-5" >
                 <div class="row mt-3">
                  <div class="col-md-12 d-flex justify-content-center">
                    <a class="text-center rounded" id="meeting-room" value="3"><img class="img-button" src="{{ URL::asset('images/meeting-room.jpg')}}" alt=""></a> 
                    <a class="text-center rounded" id="podcast-room" value="2"><img class="img-button" src="{{ URL::asset('images/podcast-room.jpg')}}" alt=""></a>
                    <a class="text-center rounded" id="lab-room" value="1"><img class="img-button" src="{{ URL::asset('images/lab-room.jpg')}}" alt=""></a> 
                  </div>
                </div>
              </div>
             
              @if (session('success'))
              <div class="alert alert-success" role="alert">
                {{ session('success') }}
              </div>
              @endif
          
              <table id="datatable" class="table table-striped table-bordered mt-3">
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
                      <a type="submit" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever="{{ $item->surat_peminjaman }}"><i class="fa fa-eye"></i></a>
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
              <div class="d-grid mt-3 mr-3 d-md-flex justify-content-md-end">
                <a href="{{ route('jadwal.create') }}" class="btn btn-primary mb-3">TAMBAH DATA</a>
              </div>

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
        <iframe width="750" height="400"></iframe>
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

@push('scripts')
<script>
//ajax filter buttons

let meetingRoom=document.querySelector('#meeting-room');
let podcastRoom=document.querySelector('#podcast-room');
let labRoom=document.querySelector('#lab-room');

// meetingRoom.addEventListener('click',function(){
//   console.log(labRoom.getAttribute('value'))
// });

$('#meeting-room').click(function(e){
        e.preventDefault();
        var filtertables = $('#datatable').DataTable( {
            "processing": true,
            "serverSide": true,
            "ajax": {
                url:"/ordersFilterAjaxData",
                "data": function ( d ) {
                    d.extra_search = labRoom.getAttribute('value');
                }
            },
            "columns": [
                { "data": "tripId" },
                { "data": "username" },
                { "data": "MTS" },
                { "data": "drivername" }, 
                { "data": "date" },
                { "data": "time" },
                { "data": "user_order_amount" },
                { "data": "user_order_pay_mode" },
                { "data": "user_order_status" },
                { "data": "rideStatus" }, 
                { "data": "Dvr" },
                { "data": "Serv" },                 
            ]

        })
      });

//preview photos
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
  var modal_url_photo = exampleModal.querySelector('.modal-body iframe')
  // console.log(recipient)
  modal_url_photo.src="storage/"+recipient; 
})

//function clockdate
function startTime() {
    var today = new Date();
    var hr = today.getHours();
    var min = today.getMinutes();
    var sec = today.getSeconds();
    ap = (hr < 12) ? "<span>AM</span>" : "<span>PM</span>";
    hr = (hr == 0) ? 12 : hr;
    hr = (hr > 12) ? hr - 12 : hr;
    //Add a zero in front of numbers<10
    hr = checkTime(hr);
    min = checkTime(min);
    sec = checkTime(sec);
    document.getElementById("clock").innerHTML = hr + ":" + min + ":" + sec + " " + ap;
    
    var months = ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'];
    var days = ['Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat'];
    var curWeekDay = days[today.getDay()];
    var curDay = today.getDate();
    var curMonth = months[today.getMonth()];
    var curYear = today.getFullYear();
    var date = curWeekDay+", "+curDay+" "+curMonth+" "+curYear;
    document.getElementById("date").innerHTML = date;
    
    var time = setTimeout(function(){ startTime() }, 500);
}
function checkTime(i) {
    if (i < 10) {
        i = "0" + i;
    }
    return i;
}
startTime();

</script>
  
@endpush
