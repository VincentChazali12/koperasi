@extends('template.master')
@section('css')
<!-- Google Font: Source Sans Pro -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <!-- Font Awesome -->
  <link rel="stylesheet" href="../../plugins/fontawesome-free/css/all.min.css">
  <!-- DataTables -->
  <link rel="stylesheet" href="../../plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <link rel="stylesheet" href="../../plugins/datatables-buttons/css/buttons.bootstrap4.min.css">
  <!-- Theme style -->
  <link rel="stylesheet" href="../../dist/css/adminlte.min.css">
@endsection
@section('content')
@if (session()->has('success'))
        <div class="alert alert-primary">
            {{ session()->get('success') }}
        </div>
@endif
  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Piutang</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Piutang</li>
            </ol>
          </div>
        </div>
      </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="container-fluid">
        <div class="row">
          <div class="col-12">
            <div class="card">
             <div class="card-body">
                <!-- Button trigger modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Pinjaman
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Pinjaman</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                      </div>
                      <div class="modal-body">
                        <form action="{{route('piutang.store')}}" role="form" method="POST">
                        @csrf
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="nik">NIK</label>
                              <input type="text" class="form-control nik" name="nik" id="nik" placeholder="Masukkan NIK" >
                            </div>
                            <div class="form-group col-6">
                              <label for="nama">Nama</label>
                              <input type="text" class="form-control " name = "nama"id="nama" placeholder="Masukkan Nama">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="usulan">Usulan Pinjaman</label>
                              <input type="text" class="form-control usulan" name="usulan" id="usulan" placeholder="Masukkan Tempat, Tanggal Lahir">
                            </div>
                            <div class="form-group col-6">
                              <label for="waktu">Jangka Waktu</label>
                              <input type="text" class="form-control waktu" name="waktu" id="waktu" placeholder="Masukkan Alamat">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="ket">Keterangan</label>
                              <input type="text" class="form-control ket" id="ket" name="ket" placeholder="Masukkan Tempat Tugas">
                            </div>
                            <div class="form-group col-6">
                              <label for="pinj">Pinjaman yang Diberikan</label>
                              <input type="text" class="form-control pinj" name="pinj" id="pinj" placeholder="Masukkan No Telp">
                            </div>
                          </div>
                          <button type="submit" class="btn btn-primary col-12" >Tambah</button>
                        </form>
                      </div>
                      <div class="modal-footer"> 
                        <button type="button"  class="btn btn-default" data-dismiss="modal">Batal</button>
                      </div>
                    </div><!-- /.modal-content -->
                  </div><!-- /.modal-dialog -->
                </div><!-- /.modal -->
                <!-- Button trigger modal -->
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>TGl Usulan</th>
                    <th>Usulan Pinjaman</th>
                    <th>Sisa Hutang</th>
                    <th>Pinjaman Diterima</th>
                    <th>Janga Waktu</th>
                    <th>Ket</th>
                  </tr>
                  </thead>
                  <tbody>
                  
                      @foreach($piutang as $data)
                      
                      <tr>
                          @no = 0
                          <td>{{$no++}}</td>
                          <td>{{$data->id_user}}</td>
                          <td>{{$data->created_at}}</td>
                          <td>{{$data->usulam}}</td>
                          <td>{{$data->sisa}}</td>
                          <td>{{$data->diberi}}</td>
                          <td>{{$data->waktu}}</td>
                          <td>{{$data->ket}}</td>
                          
                      </tr>
                      
                      @endforeach
                      
                  </tbody>
                  
                </table>
                
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
          <!-- /.col -->
        </div>
        <!-- /.row -->
      </div>
      <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>
@endsection
@section('js')
<!-- jQuery -->
<script src="plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="plugins/datatables/jquery.dataTables.min.js"></script>
<script src="plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="plugins/jszip/jszip.min.js"></script>
<script src="plugins/pdfmake/pdfmake.min.js"></script>
<script src="plugins/pdfmake/vfs_fonts.js"></script>
<script src="plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(document).ready(function () {
  $('#example1').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection