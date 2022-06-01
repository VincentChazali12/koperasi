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
                    <h1>Cetak Surat</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="#">Cetak Surat</a></li>
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


                            <!-- Button trigger modal -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                                Cetak Surat Permohonan BSI
                            </button>

                            <button class="btn btn-primary" onclick="excel()">
                                Unduh Laporan Data
                            </button>
                            <table id="example1" class="table table-bordered table-striped">
                                <tbody>
                                    <tr>
                                        <th>Nama</th>
                                        <th>NIK</th>
                                        <th>Total Simpanan Pokok</th>
                                        <th>Total Simpanan Qurban</th>
                                        <th>Total Simpanan Hari Raya</th>
                                        <th>Total Simpanan Modal</th>
                                        <th>Total Pinjaman</th>
                                        <th>Sisa Pinjaman</th>
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

                            <!-- Button trigger modal -->
                            <button class="btn btn-primary" data-toggle="modal" data-target="#Modal">
                                Cetak Surat Permohonan
                            </button>

                            <!-- Modal -->
                            <div class="modal fade" id="Modal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                                <div class="modal-dialog modal-lg">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h4 class="modal-title" id="myModalLabel">Keperluan Surat</h4>
                                            <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                                        </div>
                                        <div class="modal-body">
                                            <form action="print" role="form" method="GET">
                                                <div class="form-group">
                                                    <label for="ks">Keperluan Surat</label>
                                                    <select class="form-control ks" id="ks" name="ks">
                                                        <option value="">Pilih Perihal</option>
                                                        <option value="Tabungan kurban">Tabungan kurban</option>
                                                        <option value="Tabungan hari raya">Tabungan hari raya</option>
                                                        <!-- <label>Lainnya</label>
                              <input type="text" name="ks" class="form-control" placeholder="Lainnya"> -->
                                                    </select>
                                                </div>
                                                <div class="form-group" id="fbaru">

                                                </div>
                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Cetak</button>
                                                </div>
                                            </form>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                                        </div>
                                    </div><!-- /.modal-content -->
                                </div><!-- /.modal-dialog -->
                            </div><!-- /.modal -->
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
    function excel() {
        $(document).ready(function() {
            $("#example1").table2excel({
                filename: "Data.xls"
            });
        });
    }
</script>

<script src="//ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js">
</script>
<script src="//cdn.rawgit.com/rainabba/jquery-table2excel/1.1.0/dist/jquery.table2excel.min.js">
</script>
@endsection