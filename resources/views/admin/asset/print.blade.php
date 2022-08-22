<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>CETAK LAPORAN ASSET</title>
    <style>
        .kop{
          text-align: center;
        }
       
        .judul{
            text-align: center;
        }
        .table{
            border: 1px solid black;
            /* border-collapse: collapse; */
            font-size: 12px;
        }
        
        th {
        /* background-color: #96D4D4; */
            text-align: center;
            padding-top:7px;
            padding-bottom: 7px;
            
        }
        td{
          text-align: center;
        }
        tr:nth-child(even) {
            background-color: #D6EEEE;
            
        }
        .ttd{
            text-align: center;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="kop">
          <img src="./public/images/logo-unair.png" alt="">
            <h1>UNIVERSITAS AIRLANGGA</h1>
            <h3 style="margin-top:-20px;">DIREKTORAT INOVASI DAN PENGEMBANGAN PENDIDIKAN</h3>
            <h5 style="margin-top:-20px;"> Kampus C Mulyorejo Surabaya 60115 Telp. (031) 5920424, Fax. (031) 5920532</h5>
            <h5 style="margin-top:-20px;"> Laman: www.ditipp.unair.ac.id      e-mail: direktorat@ditipp.unair.ac.id</h5>
            <HR>
        </div>
      </div>
    <div class="row">
        <div class="judul">
            <h3>DAFTAR INVENTARIS RUANGAN</h3>
            <h4>{{ $nama_ruang }}</h4>
        </div>
    </div>

    <table class="table table-striped" style="width:100%">
        <thead style="background-color: green;color:white;font-family: Arial, Helvetica, sans-serif;">
          <tr>
            <th>No</th>
            <th>Kode Barang</th>
            <th>Nama Barang</th>
            <th>Merk Barang</th>
            <th>Tanggal Perolehan</th>
            {{-- <th>Ruangan</th> --}}
            <th>Sumber Dana</th>
            <th>Jumlah Barang</th>
            <th>Harga Barang</th>
            <th>Keterangan</th>
            <th>Status</th>
            {{-- <th class="text-center">aksi</th> --}}
          </tr>
        </thead>
        <tbody>
          {{-- @dd($room) --}}
          @foreach ($room as $item )
          <tr>
            <th scope="row">{{ $loop->iteration }}</th>
            <td>{{ $item->kode_barang }}</td>
            <td>{{ $item->nama_barang }}</td>
            <td>{{ $item->merk_barang }}</td>
            <td>{{ $item->tanggal_perolehan }}</td>
            {{-- <td>{{ $item->ruangan->nama_ruang }}</td> --}}
            <td>{{ $item->sumber_dana }}</td>
            <td>{{ $item->jumlah_barang }}</td>
            <td style="width:13%">@currency($item->harga_barang)</td>
            <td>{{ $item->keterangan }}</td>
            <td>{{ $item->status }}</td>
            {{-- <td><img src="{{asset('storage/'.$item->foto_barang) }}" alt="" srcset=""></td> --}}
            {{-- <td class="text-center">
              <a href="{{ route('asset.edit',$item->id) }}" class="btn btn-primary"><i class="fa fa-gear"></i></i></button>
              <a type="submit" class="btn btn-warning"  data-bs-toggle="modal" data-bs-target="#exampleModal" data-bs-whatever={{ $item->foto_barang }}><i class="fa fa-eye"></i></a>
              <form action="{{ route('asset.destroy',$item->id) }}" method="POST" class="d-inline">
                @csrf
                @method('delete')
                <button type="submit" class="btn btn-danger border-0" onclick="return confirm('Apakah Kamu yakin?')"><i class="fa fa-close"></i></button>
            </form>
            
            </td>
            {{--  --}}
          </tr>
          @endforeach 
         
        </tbody>
      </table>
    </div>

    <table class="ttd" style="width:100%;margin-top:60px;">
        <tr>
            <td>
                <p>Penanggung Jawab UAKPB</p>
                <br>
                <br>
                <br>
                <p>Dra. Nur Wulan, M.A., Ph.D.</p>
                <p>NIP. 197012191993032001</p>
            </td>

            <td>
                <p style="margin-top:-5px;">Surabaya,{{ \Carbon\Carbon::now()->format('d F Y')}}</p>
                <p style="margin-top:-10px;">Penanggung Jawab Ruangan</p>
                <br>
                <br>
                <br>
                <p>Niko Fahrianto</p>
                <p>NIK. 199603202018125101</p>                   
            </td>
        </tr>
        <tr style="background-color:white;">
            <td colspan="2" style="text-align:center;">
                <p>mengetahui,</p>
                <p>Direktur</p>
                <br>
                <br>
                <br>
                <p>Prof. Dr. I Made Narsa, SE., M.Si., Ak., CA.</p>
                <p>NIP. 196506271991031003</p>   
            </td>
        </tr>
    </table>

  

    <!-- Optional JavaScript; choose one of the two! -->

    <!-- Option 1: Bootstrap Bundle with Popper -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>

    <!-- Option 2: Separate Popper and Bootstrap JS -->
    <!--
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js" integrity="sha384-7+zCNj/IqJ95wo16oMtfsKbZ9ccEh31eOz1HGyDuCQ6wgnyJNSYdrPa03rtR1zdB" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.min.js" integrity="sha384-QJHtvGhmr9XOIpI6YVutG+2QOK9T+ZnN4kzFN1RtK3zEFEIsxhlmWl5/YESvpZ13" crossorigin="anonymous"></script>
    -->
  </body>
</html>