<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Ionicons -->
    <link rel="stylesheet" href="{{ asset('https://code.ionicframework.com/ionicons/2.0.1/css/ionicons.min.css') }}">
    <!-- Tempusdominus Bootstrap 4 -->
    <link rel="stylesheet" href="{{ asset('plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- JQVMap -->
    <link rel="stylesheet" href="{{ asset('plugins/jqvmap/jqvmap.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Daterange picker -->
    <link rel="stylesheet" href="{{ asset('plugins/daterangepicker/daterangepicker.css') }}">
    <!-- summernote -->
    <link rel="stylesheet" href="{{ asset('plugins/summernote/summernote-bs4.min.css') }}">
    <style>
        body{
            font-family:"Times New Roman"
        }
        .head{
            text-align: center;
            font-weight: bold;
            border-bottom: 1px solid black;
        }
        .j{
            font-size: 22px;
        }
        .sj{
            font-size: 16px;
        }
        .isi{
            font-size: 16px;
            margin-top: 50px;
            padding: 50px;
            text-align: justify;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <section class="content">
            
            <div class="row">
                <div class="col-1"></div>
                <div class="col-10 head">
                    <div class="j">KOPERASI PEGAWAI REPUBLIK INDONESIA (KPRI)</div>
                    <div class="sj">KANTOR WILAYAH KEMENTRIAN AGAMA PROVINSI RIAU <br>
                    Alamat : Jl. Kartini No. 01 Pekanbaru</div>
                </div>
            </div>
            <div class="row isi">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="salam">
                        Kepada Yth. <br>
                        Pengurus KPRI <br>
                        Kanwil Kementerian Agama Provinsi Riau <br>
                        Di <br>
                        Pekanbaru <br>
                    </div>
                    <br><br>
                    <div class="data">
                        Saya yang bertanda tangan dibawah ini : <br><br>
                        <table>
                            <tr>
                                <td>Nama</td>
                                <td>:</td>   
                            </tr>
                            <tr>
                                <td>Tanggal Lahir</td>
                                <td>:</td>   
                            </tr>
                            <tr>
                                <td>NIK</td>
                                <td>:</td>   
                            </tr>
                            <tr>
                                <td>Alamat</td>
                                <td>:</td>   
                            </tr>
                            <tr>
                                <td>Tempat Tugas</td>
                                <td>:</td>   
                            </tr>
                            <tr>
                                <td>No. Telp/HP</td>
                                <td>:</td>   
                            </tr>
                            <tr>
                                <td>Nomor Rekening &emsp;</td>
                                <td>:</td>   
                            </tr>
                        </table>
                    </div> <br>
                    <div class="badan">
                        <p>Dengan ini mengajukan ikut @php {{echo $_GET['ks'];   }} @endphp kepada Pengurus Koperasi Pegawai Republik Indonesia (KPRI) Kanwil Departemen Agama Provinsi Riau, sebesar Rp.________________ / bulan dimulai bulan ______________, uang tersebut akan diauto debet dari rekening gaji / bayar langsung setiap bulannya.</p>
                        <p>Demikian permohonan ini saya sampaikan untuk dapat dipergunakan sebagaimana mestinya.</p>
                    </div>
                    <div class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            Pekanbaru, _______________________ <br>
                            Saya yang bermohon <br><br><br><br>
                            ___________________
                        </div>
                    </div>

                </div>
            </div>
            
            
        </section>
    </div>
</body>
<script>
  window.addEventListener("load", window.print());
</script>
</html>