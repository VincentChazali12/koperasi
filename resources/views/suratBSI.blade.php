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
                <div class="col-1">
                    <img src="{{ url('img/logo.png') }}" alt="" width="100px">
                </div>
                <div class="col-10 head">
                    <div class="j">KOPERASI PEGAWAI REPUBLIK INDONESIA (KPRI)</div>
                    <div class="sj">KANTOR WILAYAH KEMENTRIAN AGAMA PROVINSI RIAU <br>
                    Alamat : Jl. Kartini No. 01 Pekanbaru</div>
                </div>
            </div>
            @csrf
            <div class="row isi">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="salam">
                        Nomor   : KPRI-KEMENAG/12/2022/ <br>
                        Sifat &nbsp;&nbsp;&nbsp;&nbsp;: {{$_GET['sifat']}} <br>
                        Lamp   &nbsp; : 1 (satu) rangkap <br>
                        Perihal : {{$_GET['ks']}}<br>
                    </div>
                    <br><br>
                    <div style="margin-left:5% ;" class="data">
                        Kepada
                        <table>
                            <tr>
                                <td>Yth. Pimpinan Bank Mandiri Syariah</td>   
                            </tr>
                            <tr>
                                <td>Kantor Cabang Harapan Raya Pekanbaru</td>   
                            </tr>
                            <tr>
                                <td>di</td>  
                            </tr>
                            <tr>
                                <td>Pekanbaru</br></br></td>  
                            </tr></br></br>
                            <tr>
                                <td>Dengan Hormat,</td>  
                            </tr>
                        </table>
                    </div> <br>
                    <div style="margin-left:5% ;" class="badan">
                        <p>Mohon Bantuan Saudara untuk melakukan Debet Tunjangan Kinerja Pegawai Kantor Wilayah Kementrian Agama Provinsi Riau
                            pada tanggal {{$_GET['tanggal']}} ke Nomor Rekening 7109371167 atas nama KPRI KANWIL DEPAG PROPINSI RIAU sebagaimana daftar terlampir.
                        </p>
                        <p>Demikian kami sampaikan, atas perhatian dan kerjasamanya diucapkan terima kasih.</p>
                        
                    </div>
    </br>
                    <div style="margin-left:5% ;" class="row">
                        <div class="col-9"></div>
                        <div class="col-3">
                            <table>
                            <tr><td style="text-align:center ;">
                            PENGURUS, </br>BENDAHARA</td></tr>
                            <tr><td style="text-align:center ; font-weight:bold;"> 
                             <br><br><br><br>
                             {{$_GET['nama']}}</td></tr></table>
                        </div>
                    </div>

                </div>
            </div>
        
            
        </section>
    </div>
</body>
<script>
  //window.addEventListener("load", window.print());
</script>
</html>