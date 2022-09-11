<table>
    <thead>
        <tr>
            <th>KODE MATA KULIAH</th>
            <th>NAMA MATA KULIAH</th>
            <th>JENJANG</th>
        </tr>
          
    </thead>
    <tbody>
        @foreach ($items as $item => $row)
        <tr>
          <td>{{$row['kode_matkul']}}</td>
          <td>{{$row['nama_matkul']}}</td>
          <td>{{$row['jenjang']}}</td>
        </tr>
         @endforeach
    </tbody>
</table>