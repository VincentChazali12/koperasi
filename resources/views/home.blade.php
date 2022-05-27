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
                <!-- Button trigger modal -->
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal">
                  Tambah Anggota
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" >
                    <div class="modal-content">
                      <div class="modal-header">
                        <h4 class="modal-title" id="myModalLabel">Tambah Anggota</h4>
                        <button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>

                      </div>
                      <div class="modal-body">
                        <form action="{{route('anggota.store')}}" role="form" method="POST">
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
                              <label for="ttl">Tempat, Tanggal Lahir</label>
                              <input type="text" class="form-control ttl" name="ttl" id="ttl" placeholder="Masukkan Tempat, Tanggal Lahir">
                            </div>
                            <div class="form-group col-6">
                              <label for="alamat">Alamat</label>
                              <input type="text" class="form-control alamat" name="alamat" id="alamat" placeholder="Masukkan Alamat">
                            </div>
                          </div>
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="tt">Tempat Tugas</label>
                              <input type="text" class="form-control tt" id="tt" name="tt" placeholder="Masukkan Tempat Tugas">
                            </div>
                            <div class="form-group col-6">
                              <label for="telp">No. Telp/HP</label>
                              <input type="text" class="form-control telp" name="telp" id="telp" placeholder="Masukkan No Telp">
                            </div>
                          </div>
                          
                          <div class="row">
                            <div class="form-group col-6">
                              <label for="norek">Nomor Rekening</label>
                              <input type="text" class="form-control norek" name="norek" id="norek" placeholder="Masukkan Nomor Rekening">
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
                <button class="btn btn-primary" data-toggle="modal" data-target="#myModal1">
                  Cetak Surat Permohonan
                </button>

                <!-- Modal -->
                <div class="modal fade" id="myModal1" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
                  <div class="modal-dialog modal-lg" >
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
                              <option value=""></option>
                              <option value="anggota">permintaan menjadi anggota baru</option>
                              <option value="simpanan kurban">Pembukaan simpanan kurban</option>
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
                <br><br>
                @if (session()->has('success'))
                  <div class="alert alert-primary">
                     {{ session()->get('success') }}
                     <form action="kasMasuk" role="form" method="GET" target="_blank">
                        <input type="hidden" name="sp" value = {{ session()->get('sp')}}>
                        <input type="hidden" name="sw" value = {{ session()->get('sw')}}>
                        <input type="hidden" name="swk" value = {{ session()->get('swk')}}>
                        <input type="hidden" name="sm" value = {{ session()->get('sm')}}>
                        <input type="hidden" name="ss" value = {{ session()->get('ss')}}>
                        <input type="hidden" name="dr" value = {{ session()->get('dr')}}>
                        <input type="hidden" name="dari" value = {{ session()->get('dari')}}>
                        <input type="hidden" name="ket" value = "Simpanan Anggota Baru ".{{ session()->get('dari')}}>
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Cetak Kas Masuk</button>
                     </form>
                  </div>
                @endif
                @if (session()->has('successs'))
                  <div class="alert alert-primary">
                     {{ session()->get('successs') }}
                     <form action="kasKeluar" role="form" method="GET" target="_blank">
                        <input type="hidden" name="sp" value = {{ session()->get('sp')}}>
                        <input type="hidden" name="sw" value = {{ session()->get('sw')}}>
                        <input type="hidden" name="swk" value = {{ session()->get('swk')}}>
                        <input type="hidden" name="sm" value = {{ session()->get('sm')}}>
                        <input type="hidden" name="ss" value = {{ session()->get('ss')}}>
                        <input type="hidden" name="dr" value = {{ session()->get('dr')}}>
                        <input type="hidden" name="dari" value = {{ session()->get('dari')}}>
                        <input type="hidden" name="ket" value = "Dikeluarkan Simpanan Anggota ".{{ session()->get('dari')}}>
                        <button type="submit" class="btn btn-default" data-dismiss="modal">Cetak Kas Keluar</button>
                     </form>
                  </div>
                @endif
                <table id="example1" class="table table-bordered table-striped">
                  <thead>
                  <tr>
                    <th>NIK</th>
                    <th>Nama</th>
                    <th>TTL</th>
                    <th>Alamat</th>
                    <th>Tempat Tugas</th>
                    <th>Telp</th>
                    <th>Rekening</th>
                    <th>Status</th>
                    <th>Aksi</th>
                  </tr>
                  </thead>
                  <tbody>
                    @foreach($anggota as $data)
                    
                            
                      <tr>
                      <form onsubmit="return confirm('Apakah Anda Yakin ?');" action="{{ route('anggota.create') }}" role="form" method="POST">
                  @csrf
                  @method('PUT')
                        <td>
                          {{$data->nik}}
                        </td>
                        <td>
                          {{$data->nama}}
                        </td>
                        <td>
                          {{$data->ttl}}
                        </td>
                        <td>
                          {{$data->alamat}}
                        </td>
                        <td>
                          {{$data->tempat_tugas}}
                        </td>
                        <td>
                          {{$data->telp}}
                        </td>
                        <td>
                          {{$data->norek}}
                        </td>
                        <td>
                          {{$data->status}}
                        </td>
                          <input type="hidden" value="{{$data->nik}}" id="ida" name="ida">
                          <td><input type="submit" class="btn" value="Tambah"></td>
                    </form>
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

var x = document.getElementById("ks");
var box = x.value;

if(box == "anggota"){
  document.getElementById("fbaru").innerHTML="<label for='nik'>Masukkan Nik / Nama</label>"
                            +"<input type='text' name='nik' list='niknama'>"
                              +"<datalist id = 'niknama'>"
                                +"@foreach($anggota as $data)"
                                +"<option data-value='{{$data->nik}}'>{{$data->nik}} | {{$data->nama}}</option>"
                                +"@endforeach"
}

</script>
<script>
	function openInNewTab(url) {
		var win = window.open(url, '_blank');
		win.focus();
	}
</script>
@endsection