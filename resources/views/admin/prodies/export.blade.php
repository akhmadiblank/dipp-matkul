<table>
    <thead>
        <tr>
            <th>FAKULTAS</th>
            <th>KODE PROGRAM STUDI</th>
            <th>NAMA PROGRAM STUDI</th>
            <th>JENJANG</th>
            <th>AKREDITASI</th>
            <th>TAHUN KURIKULUM</th>
          </tr>
          
    </thead>
    <tbody>
        @foreach ($items as $item => $row)
        <tr>
          <td>{{$row['fakultas']}}</td>
          <td>{{$row['kode_prodi']}}</td>
          <td>{{$row['nama_prodi']}}</td>
          <td>{{$row['jenjang']}}</td>
          <td>{{$row['akreditasi']}}</td>
          <td>{{$row['masterKurikulum']}}</td>
        </tr>
         @endforeach
    </tbody>
</table>