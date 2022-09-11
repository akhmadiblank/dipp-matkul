<table>
    <thead>
        <tr>
            <th>Semester</th>
            <th>Nama Matkul</th>
            <th>Beban Studi</th>
            <th>Bentuk Pembelajaran</th>
            <th>Kategori Unsur</th>
            <th>Prasyarat</th>
            <th>Project Based Learning</th>
            <th>Case Based Learning</th>
            <th>Problem Based Learning</th>
            <th>Others</th>
            <th>keterangan</th>
          </tr>
          
    </thead>
    <tbody>
        @foreach ($items as $item => $row)
        <tr>
          <td>{{$row['semester']}}</td>
          <td>{{$row['nama_matkul']}}</td>
          <td>{{$row['beban_studi']}}</td>
          <td>{{$row['bentuk_pembelajaran']}}</td>
          <td>{{$row['kategori_unsur']}}</td>
          <td>{{$row['prasyarat']}}</td>
          <td>{{$row['project_base_learning']}}</td>
          <td>{{$row['case_base_learning']}}</td>
          <td>{{$row['problem_based_learning']}}</td>
          <td>{{$row['others']}}</td>
          <td>{{$row['keterangan']}}</td>
        </tr>
         
         @endforeach
    </tbody>
</table>