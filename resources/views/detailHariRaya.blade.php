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
  <!-- Main Sidebar Container -->
  
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Daftar Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Home</a></li>
              <li class="breadcrumb-item active">Anggota</li>
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
                
                @foreach($detail1 as $data)
                  <div class="row">
                    <div class="col-4">
                      Simpanan Qurban Tahun {{$data->tahun}} 
                    </div>
                    <div class="col-4">
                      Oleh {{$data->nama}} ({{$data->nik}}) 
                    </div>
                  </div>  
                  <div class="row">
                    <div class="col-4">
                      Status:  {{$data->status}} 
                    </div>
                    <div class="col-4">
                      Biaya Simpanan Perbulan: {{$data->nominal}} 
                    </div>
                  </div>
                  <!-- Modal -->
                  <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" >
                      <div class="modal-content">
                        <div class="modal-header">
                          <h4 class="modal-title" id="myModalLabel">Data Simpanan</h4>
                          <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
                        </div>
                        <div class="modal-body">
                          <form action="{{route('simpanQurban')}}" role="form" method="POST">
                            @csrf
                            <div class="row">
                              <div class="form-group col-6">
                                <label for="ida">NIK | Nama</label>
                                <input type="text" class="form-control ida" id="ida" value="{{$data->nik}} | {{$data->nama}}" name="ida" readonly>
                                <input type="hidden" class="form-control idq" id="idq" value="{{$data->id}}" name="idq">
                                

                              </div>
                            
                              <div class="form-group col-6">
                                <label for="thn">Tahun</label>
                                <input type="text" class="form-control thn" id="thn" value="{{$data->tahun}}" name="thn" readonly>
                              </div>
                            </div>
                            <div class="form-group row">
                              <div class="col-6">
                                <label for="nominal">Bulan</label>
                                <input type="number" class="form-control bulan" id="bulan" placeholder="Masukkan Keperluan Surat" name="bulan" min="1" max="12" value="{{date('m')}}">
                              </div>
                              <div class="col-6">
                                <label for="nominal">Nominal</label>
                                <input type="text" class="form-control nominal" id="nominal" placeholder="Masukkan Keperluan Surat" name="nominal" value="{{$data->nominal}}" readonly>
                              </div>
                            </div>
                            <div class="form-group">
                              <button type="submit" class="btn btn-primary">Tambah</button>
                            </div>
                          </form>
                        </div>
                        <div class="modal-footer">
                          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                        </div>
                      </div><!-- /.modal-content -->
                    </div><!-- /.modal-dialog -->
                  </div><!-- /.modal -->
                @endforeach
                <br>
                <!-- Button trigger modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                  Tambah Simpanan
                </button>
                <br><br>
                
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Bulan</th>
                    <th>Simpanan</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php 
                    $no=1;
                  @endphp
                  @foreach($detail as $data)
          
                  <tr>
                    <td>{{$no}}</td>
                    <td>{{date("F", mktime(0, 0, 0, $data->bulan, 10))}}</td>
                    <td>{{$data->simpanan}}</td>
                  </tr>
                  @php
                    $no++;
                  @endphp
                  
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
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="../../plugins/datatables/jquery.dataTables.min.js"></script>
<script src="../../plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="../../plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="../../plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="../../plugins/jszip/jszip.min.js"></script>
<script src="../../plugins/pdfmake/pdfmake.min.js"></script>
<script src="../../plugins/pdfmake/vfs_fonts.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="../../plugins/datatables-buttons/js/buttons.colVis.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
<!-- Page specific script -->
<script>
  $(document).ready(function() {
  $('#example1').DataTable();
  $('.dataTables_length').addClass('bs-select');
});
</script>
@endsection