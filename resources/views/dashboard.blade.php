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
  @csrf
  <!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <div class="container-fluid">
        <div class="row mb-2">
          <div class="col-sm-6">
            <h1>Dashboard</h1>
          </div>
          <div class="col-sm-6">
            <ol class="breadcrumb float-sm-right">
              <li class="breadcrumb-item"><a href="#">Dashboard</a></li>
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
                
              
                

                
</br></br>

                  
                    

                <table id="example1" class="table table-bordered table-striped">
                  <tbody>
                  <tr>
                    <th>Total Anggota</th>
                        <th>Total Piutang</th>
                        <th>Total Simpanan Pokok</th>
                        <th>Total Simpanan Qurban</th>
                        <th>Total Simpanan Hari Raya</th>
                        <th>Total Simpanan Modal</th>
                  </tr>
                  <tr>
                  <td>
                        @foreach($totalanggota as $data)
                        {{$data->totala}}@endforeach
                        </td>
                        <td>
                        @foreach($totalpiutang as $data)
                        {{$data->totalp}}@endforeach
                        </td>
                        <td>
                        @foreach($totalsp as $data)
                        {{$data->totalsp}}@endforeach
                        </td>
                        <td>
                        @foreach($totalsq as $data)
                        {{$data->totalsq}}@endforeach
                        </td>
                        <td>
                        @foreach($totalsh as $data)
                        {{$data->totalsh}}@endforeach
                        </td>
                        <td>
                        @foreach($totalsm as $data)
                        {{$data->totalsm}}@endforeach
                        </td>
                  </tr>
                  </tbody>
                  
                </table>
</br></br>
                
                
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
  function excel(){
    $(document).ready(function () {
    $("#example1").table2excel({
        filename: "Data.xls"
    });
 });
  }
</script>

<script src=
"//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
</script>
<script src=
"//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>
@endsection