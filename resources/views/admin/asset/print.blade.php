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
          position:relative;
          font-family: 'Times New Roman', Times, serif;
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
            padding-right: 7px;
            padding-left: 7px;
            border: 1px solid black;
            vertical-align: middle;
          
            
            
        }
       
        td{
          
          text-align: center;
          
          border: 1px solid black;
        }
        tr:nth-child(even) {
            background-color: #D6EEEE;
            
        }
        table .ttd>tr>td>p{
          line-height:0.8;

        }
        .ttd{
            text-align: center;
            font-size: 12px;
            line-height: 0.8;
            
        }
        
        h3,h5{
          margin-top:-10px;
          font-size: 12px;
        }
        .logo{
          position:absolute;

        }
        
        @page {
            margin: 50px 10px 0px 10px !important;
            padding: 0px 0px 0px 0px !important;
        }
    </style>
  </head>
  <body>
    <div class="container">
      <div class="row">
        <div class="kop">
          <img class="logo" src="{{ asset('images/logo-unair.png') }}" alt="" width=80>
          <div style="margin-left: 30px;font-size: 10px;">
            <h1>UNIVERSITAS AIRLANGGA</h1>
            <h2 style="margin-top: -12px;">DIREKTORAT INOVASI DAN PENGEMBANGAN PENDIDIKAN</h2>
              <div style="line-height:1;margin-top:-10px;">
              <p> Kampus C Mulyorejo Surabaya 60115 Telp. (031) 5920424, Fax. (031) 5920532<br>
               Laman: www.ditipp.unair.ac.id      e-mail: direktorat@ditipp.unair.ac.id</p>
              </div>
            </div>
            <HR style="margin-top: -0.5px;">
          </div>
      </div>
      <div class="row" style="margin-top: 15px;">
          <div class="judul">
              <h3 style="text-transform: uppercase;">DAFTAR INVENTARIS {{ $nama_ruang }}</h3>
              
          </div>
      </div>

      <table class="table" style="width:100%">
          <thead style="background-color: green;color:white;font-family: Arial, Helvetica, sans-serif;">
            <tr>
              <th>No</th>
              <th>Kode Barang</th>
              <th>Nama Barang</th>
              <th>Merk Barang</th>
              <th>Tanggal Perolehan</th>
            
              <th>Sumber Dana</th>
              <th>Jumlah Barang</th>
           
              <th>Ket</th>
              <th>Status</th>
            
            </tr>
          </thead>
          <tbody>
          
            @foreach ($room as $item )
            <tr>
              <td scope="row" style="vertical-align: middle;">{{ $loop->iteration }}</td>
              <td style="vertical-align: middle;">{{ $item->kode_barang }}</td>
              <td style="vertical-align: middle;">{{ $item->nama_barang }}</td>
              <td style="vertical-align: middle;">{{ $item->merk_barang }}</td>
              <td style="vertical-align: middle;">{{ $item->tanggal_perolehan }}</td>
             
              <td style="vertical-align: middle;">{{ $item->sumber_dana }}</td>
              <td style="vertical-align: middle;">{{ $item->jumlah_barang }}</td>
              
              <td style="vertical-align: middle;">{{ $item->keterangan }}</td>
              <td style="vertical-align: middle;">{{ $item->status }}</td>
             
            </tr>
            @endforeach 
          
          </tbody>
        </table>
      </div>

      <table class="ttd" style="width:100%;margin-top:10px;">
          <tr>
              <td style="border: 1px solid white;">
                 <br>
                  <p>Penanggung Jawab UAKPB
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  Dra. Nur Wulan, M.A., Ph.D.<br>
                  NIP. 197012191993032001</p>
              </td>

              <td style="border: 1px solid white;">
                  <p style="margin-top:-8px;">Surabaya,{{ \Carbon\Carbon::now()->format('d F Y')}}<br>
                  Penanggung Jawab Ruangan
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  Niko Fahrianto<br>
                  NIK. 199603202018125101</p>                   
              </td>
          </tr>
          <tr style="background-color:white;">
              <td colspan="2" style="text-align:center;border: 1px solid white;">
                  <p>mengetahui,<br>
                    Direktur
                  <br>
                  <br>
                  <br>
                  <br>
                  <br>
                  Prof. Dr. I Made Narsa, SE., M.Si., Ak., CA.<br>
                  NIP. 196506271991031003</p>   
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