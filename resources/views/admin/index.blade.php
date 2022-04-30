@extends('admin.layout')
@section('title')
    Dashboard |
@endsection
@section('content')

<!-- page content -->
<div class="right_col" role="main">
  <!-- top tiles -->
  <div class="row" style="display: inline-block;" >
  <div class="tile_count">
    <div class="col-md-2 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Fakultas</span>
      <div class="count">11</div>
      {{-- <span class="count_bottom"><i class="green">4% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Program Studi</span>
      <div class="count green">25</div>
      {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Mata Kuliah</span>
      <div class="count">300</div>
      {{-- <span class="count_bottom"><i class="red"><i class="fa fa-sort-desc"></i>12% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Project Based Learning</span>
      <div class="count">50</div>
      {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
    </div>
    <div class="col-md-2 col-sm-4  tile_stats_count">
      <span class="count_top"><i class="fa fa-user"></i> Total Case Based Learning</span>
      <div class="count">50</div>
      {{-- <span class="count_bottom"><i class="green"><i class="fa fa-sort-asc"></i>34% </i> From last Week</span> --}}
    </div>
  </div>
</div>
  <!-- /top tiles -->

  <div class="row">
    <div class="col-md-12 col-sm-12 ">
     
      
        <div class="x_panel">
          <div class="x_title">
            <h2>Informasi Akademik</h2>
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
              <div class="row">
                  <div class="col-sm-12">
                    <div class="card-box table-responsive">
            <table id="datatable-buttons" class="table table-striped table-bordered" style="width:100%">
              <thead>
                <tr>
                  <th rowspan="2" class="align-middle">Program Studi</th>
                  <th rowspan="2" class="align-middle">nama matakuliah</th>
                  <th colspan="2" class="text-center">Metode Pemebelajaran</th>
                  <th rowspan="2" class="align-middle text-center">keterangan</th>
                  <th rowspan="2" class="align-middle text-center">Aksi</th>
                </tr>
                <tr>
                  
               
                  <th>Project Based Learning </th>
                  <th>Case Based Learning</th>
                  
                </tr>
              </thead>


              <tbody>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Ilmu Konservasi gigi II</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td>Kuliah dan Problem Based Learning</td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                <tr>
                  <td>Kedokteran Gigi</td>
                  <td>Mikrobiologi Praktikum</td>
                  <td class="text-center">
                     <input class="form-check-input" type="checkbox" value="" id="flexCheckDefault">
                     <label class="form-check-label" for="flexCheckDefault">
                      Default checkbox
                    </label>
                  </td>
                  <td class="text-center">
                    <input class="form-check-input" type="checkbox" value="" id="flexCheckChecked" checked>
                    <label class="form-check-label" for="flexCheckChecked">
                      Checked checkbox
                    </label>
                  </td>
                  <td></td>
                  <td> 
                    <button type="submit" class="btn btn-warning"><i class="fa fa-pencil"></i></i>Update</button>
                    <button type="submit" class="btn btn-danger"><i class="fa fa-trash"></i>Delete</button>
                  </td>
                </tr>
                
              </tbody>
            </table>
          </div>
        </div>
      
    </div>
        </div>
      </div>

    </div>

  </div>
  <br />

  
</div>
<!-- /page content -->
@endsection
