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
        @media print{@page {size: landscape}}


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
            text-align: center;
        }
        table, th, td {
            border:1px solid black;
            padding:5px;
        }
        table{
            margin:auto;
        }
    </style>
    <title>Document</title>
</head>
<body>
    <div class="wrapper">
        <section class="content">
        <div class="head">
            LAPORAN SIMPANAN POKOK ANGGOTA<BR>
            LPRI KANWIL KEMENAG PROV RIAU <BR>
            TAHUN {{$_GET['from']}}-{{$_GET['from']+1}}

        </div>
        <div class="isi">
            <table >
                <th>NIK</th>
                <th>Nama</th>
                <th>Juni</th>
                <th>Juli</th>
                <th>Agustus</th>
                <th>September</th>
                <th>Oktober</th>
                <th>November</th>
                <th>Desember</th>
                <th>Januari</th>
                <th>Februari</th>
                <th>Maret</th>
                <th>April</th>
                <th>Mei</th>
                <th>Total</th>
                <th colspan="2">tanda tangan</th>
            
            @foreach($data1 as $datas1)
                <tr>
                    <td>{{$datas1->nik}}</td>
                    <td>{{$datas1->nama}}</td>
                    @php
                        $mulai = $from
                    @endphp
                    @while($mulai <= $to)
                        @php
                            $flag=0;
                        @endphp
                        @foreach($data as $datas)
                            @if($datas->nik == $datas1->nik AND $datas->waktu == $mulai)
                                @php
                                    $flag++;
                                @endphp
                           
                            @endif
                        @endforeach
                        @if($flag>0)
                            <td>Rp.75.000</td>
                        @else
                            <td>-</td>
                        @endif
                        @php
                            $mulai = date('Y-m',strtotime($mulai. '+ 1 month'));
                        @endphp
                    @endwhile
                    <td>{{$datas1->total}}</td>
                    <td></td>
                </tr>
            @endforeach
            
            
            </table>

            <div class="row" style="margin-top:50px;">
                <div class="col-4"></div>
                <div class="col-4"></div>
                <div class="col-4">
                    <div style="text-align:center;">
                        BENDAHARA <br><br><br><br>
                        ELI SYAFYARNI
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