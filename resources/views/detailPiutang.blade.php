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
            <h1>Detail Piutang Anggota</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Piutang</a></li>
              <li class="breadcrumb-item active">Detail Piutang</li>
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
                      Pinjaman {{$data->nama}} ({{$data->nik}}) 
                    </div>
                    <div class="col-4">
                      Status: {{$data->status}}
                    </div>
                  </div>
                    
                @endforeach
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>no</th>
                    <th>Bulan</th>
                    <th>Angsuran Pokok</th>
                    <th>Angsuran Jasa</th>
                    <th>Angsuran Total</th>
                    <th>Total Hutang</th>
                    <th>Sisa Hutang</th>
                    <th>Jatuh Tempo</th>
                    <th>Keterangan</th>
                  </tr>
                  </thead>
                  <tbody>
                  @php
                    $no=1;
                  @endphp
                  @foreach($detail as $data)
          
                  <tr>
                    <td>
                      {{$no}}
                    </td>
                    <td>
                      @php
                        if($data->created_at == null){
                          echo('-');
                        }else{
                          echo date("M-Y", strtotime($data->created_at));
                        }
                        $no++;
                      @endphp
                    
                    </td>
                    <td>{{$data->angsuran_pokok}}</td>
                    <td>{{$data->angsuran_jasa}}</td>
                    <td>{{$data->angsuran_total}}</td>
                    <td>{{$data->usulan}}</td>
                    <td>{{$data->sisa}}</td>
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