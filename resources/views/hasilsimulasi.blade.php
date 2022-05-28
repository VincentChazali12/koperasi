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
            <h1>Simulasi</h1>
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
                @csrf
                     {{ session()->get('success') }}
                <div class="row">
                    <div class="col-4">
                      Dana Pinjaman : Rp.{{ session()->get('usulan')}}
                    </div>
                    <div class="col-4">
                      Waktu : {{ session()->get('waktu')}} bulan
                    </div>
                  </div>
                <!-- Button trigger modal -->
                <br><br>
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama</th>
                    <th>TGl Usulan</th>
                    <th>Angsuran Pokok</th>
                    <th>Angsuran Jasa</th>
                    <th>Angsuran Total</th>
                    <th>Sisa Hutang</th>
                    <th>Waktu</th>
                    <th>status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                      <tr>
                  
                  
                
                  @php
                    $no=0;
                    $hasilsisa=0;
                    $waktu=  session()->get('waktu');
                    $waktubaru=$waktu;
                    $sisa=0;
                    $pinjaman= session()->get('usulan');          
                  @endphp
                
                  @while($no<=$waktu) 
            
                      @if($no==0)
                         @php
                            $sisa = 15000000;
                            $pinjaman=15000000;
                            $angsuran_jasa=0;
                            $angsuran_pokok=0;
                            $angsuran_total=0;
                        @endphp
                      @endif
                        
                      @if($no>0 and $no < $waktu)
                          @php
                              $angsuran_jasa=round($sisa*(0.18/12),-2);
                              $pinjaman=15000000;
                              $angsuran_total=round($pinjaman*(0.18/12)/(1-(pow((1+(0.18/12)),(-$waktu)))),-3);
                              $angsuran_pokok=round($angsuran_total-$angsuran_jasa);
                              $sisa = round($sisa-$angsuran_pokok);
                          @endphp
                      @endif
                      @if ($no==$waktu)
                      @php
                            $angsuran_jasa=round($sisa*(0.18/12),-2);
                            $pinjaman=15000000;
                            $angsuran_total=round($pinjaman*(0.18/12)/(1-(pow((1+(0.18/12)),(-$waktu)))),-3);
                            $angsuran_pokok=round($angsuran_total-$angsuran_jasa);
                            $sisa=$angsuran_pokok;
                      @endphp
                      @endif
                      <tr>
                          <td>{{$no}}</td>
                          <td>{{ session()->get('nama')}}</td>
                          <td>May-1022</td>
                          <td>{{$angsuran_pokok}}</td>
                          <td>{{$angsuran_jasa}}</td>
                          <td>{{$angsuran_total}}</td>
                          <td>{{$sisa}}</td>
                          <td>{{$waktubaru}}</td>
                          <td>Sudah Bayar</td>

                      </tr>
                      
                      
                      @php
                      $waktubaru--;
                      $no =$no+1;
                      @endphp
                
                    @endwhile

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