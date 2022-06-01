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
        }
        .j{
            font-size: 22px;
        }
        .sj{
            font-size: 16px;
        }
        .isi{
            font-size: 16px;
            padding: 50px;
            text-align: justify;
        }
    </style>
    <title>Document</title>
</head>
<body>
    @php
    function terbilang($bilangan) {

        $angka = array('0','0','0','0','0','0','0','0','0','0',
                    '0','0','0','0','0','0');
        $kata = array('','satu','dua','tiga','empat','lima',
                    'enam','tujuh','delapan','sembilan');
        $tingkat = array('','ribu','juta','milyar','triliun');

        $panjang_bilangan = strlen($bilangan);

        /* pengujian panjang bilangan */
        if ($panjang_bilangan > 15) {
        $kalimat = "Diluar Batas";
        return $kalimat;
        }

        /* mengambil angka-angka yang ada dalam bilangan,
        dimasukkan ke dalam array */
        for ($i = 1; $i <= $panjang_bilangan; $i++) {
        $angka[$i] = substr($bilangan,-($i),1);
        }

        $i = 1;
        $j = 0;
        $kalimat = "";


        /* mulai proses iterasi terhadap array angka */
        while ($i <= $panjang_bilangan) {

        $subkalimat = "";
        $kata1 = "";
        $kata2 = "";
        $kata3 = "";

        /* untuk ratusan */
        if ($angka[$i+2] != "0") {
            if ($angka[$i+2] == "1") {
            $kata1 = "seratus";
            } else {
            $kata1 = $kata[$angka[$i+2]] . " ratus";
            }
        }

        /* untuk puluhan atau belasan */
        if ($angka[$i+1] != "0") {
            if ($angka[$i+1] == "1") {
            if ($angka[$i] == "0") {
                $kata2 = "sepuluh";
            } elseif ($angka[$i] == "1") {
                $kata2 = "sebelas";
            } else {
                $kata2 = $kata[$angka[$i]] . " belas";
            }
            } else {
            $kata2 = $kata[$angka[$i+1]] . " puluh";
            }
        }

        /* untuk satuan */
        if ($angka[$i] != "0") {
            if ($angka[$i+1] != "1") {
            $kata3 = $kata[$angka[$i]];
            }
        }

        /* pengujian angka apakah tidak nol semua,
            lalu ditambahkan tingkat */
        if (($angka[$i] != "0") OR ($angka[$i+1] != "0") OR
            ($angka[$i+2] != "0")) {
            $subkalimat = "$kata1 $kata2 $kata3 " . $tingkat[$j] . " ";
        }

        /* gabungkan variabe sub kalimat (untuk satu blok 3 angka)
            ke variabel kalimat */
        $kalimat = $subkalimat . $kalimat;
        $i = $i + 3;
        $j = $j + 1;

        }

        /* mengganti satu ribu jadi seribu jika diperlukan */
        if (($angka[5] == "0") AND ($angka[6] == "0")) {
        $kalimat = str_replace("satu ribu","seribu",$kalimat);
        }

        return trim($kalimat);

    } 
    @endphp
    <div class="wrapper">
        <section class="content">
            
            <div class="row">
                <div class="col-1"></div>
                <div class="col-1">
                    <img src="{{ url('img/logo.png') }}" alt="" width="100px">
                </div>
                <div class="col-8 head">
                    <div class="j">KOPERASI PEGAWAI REPUBLIK INDONESIA (KPRI)</div>
                    <div class="j">KANWIL DEPAG PROVINSI RIAU</div>
                    <div class="sj">BADAN HUKUM NO. 58/BH/PAD/KW.K.4.5.1/II/1996 TGL. 06 FEB 1996</div>
                    <div class="sj">Jalan Kartini Nomor 01 Telp. (0761)859715 Kotak Pos 1131</div>
                    <div class="sj">PEKANBARU (28011)</div>
                </div>
            </div>
            <div class="row isi">
                <div class="col-1"></div>
                <div class="col-10">
                    <div class="row" style="border-bottom:2px solid black;">
                        <div class="j col-6">
                            <strong>  BUKTI KAS MASUK </strong>
                        </div>
                        <div class="col-6">
                            Surat Izin Usaha Simpan Pinjam No. 60/sisp/iv/11/iv/2016
                        </div>
                        
                    </div>
                    <div class="row">
                        <div class="col-8">
                            <table>
                                <tr>
                                    <td>Telah terima dari</td>
                                    <td>:</td>
                                    <td>aa</td>
                                </tr>
                                <tr>
                                    <td>Keterangan</td>
                                    <td>:</td>
                                    <td>{{$_GET['ket']}}</td>
                                </tr>
                                <tr>
                                    <td>Dengan perincian</td>
                                    <td>:</td>
                                    <td></td>
                                </tr>
                            </table>
                        </div>
                        <div class="col-1"></div>
                        <div class="col-3">
                            <table>
                                
                                <tr>
                                    <td>Nomor</td> 
                                    <td>:</td>
                                    <td>CR-05806</td>
                                </tr>
                                <tr>
                                    <td>Tanggal</td>
                                    <td>:</td>
                                    <td>{{date('d-m-Y')}}</td>
                                </tr>
                            </table>
                        </div>
                    </div>
                    <br>
                    <div class="badan row">
                        <table class="col-12">
                            <tr style="border-top:2px solid black; border-bottom:2px solid black">
                                <td>Kode</td>
                                <td style="text-align:left;">Rekening</td>
                                <td style="text-align:right;">Jumlah (Rp)</td>
                            </tr>
                        @php
                            $sum=0;
                        @endphp
                        @if($_GET['sp'] != "")
                            <tr>
                                <td>42111</td>
                                <td>Simpanan Pokok</td>
                                <td style="text-align:right;">{{$_GET['sp']}}</td>
                                @php
                                    $sum+=$_GET['sp'];
                                @endphp
                            </tr>
                        @endif
                        @if($_GET['ss'] != "")
                            <tr>
                                <td>42111</td>
                                <td>{{$_GET['jenis']}}</td>
                                <td style="text-align:right;">{{$_GET['ss']}}</td>
                                @php
                                    $sum+=$_GET['ss'];
                                @endphp
                            </tr>
                        @endif
                        @if($_GET['swk'] != "")
                            <tr>
                                <td>42111</td>
                                <td>Simpanan Wajib Khusus</td>
                                <td style="text-align:right;">{{$_GET['swk']}}</td>
                                @php
                                    $sum+=$_GET['swk'];
                                @endphp
                            </tr>
                        @endif
                        
                        @if($_GET['sw'] != "")
                            <tr>
                                <td>42111</td>
                                <td>Simpanan Wajib</td>
                                <td style="text-align:right;">{{$_GET['sw']}}</td>
                                @php
                                    $sum+=$_GET['sw'];
                                @endphp
                            </tr>
                        @endif
                        
                        @if($_GET['dr'] != "")
                            <tr>
                                <td>42111</td>
                                <td>Dara Resiko</td>
                                <td style="text-align:right;">{{$_GET['dr']}}</td>
                                @php
                                    $sum+=$_GET['dr'];
                                @endphp
                            </tr>
                        @endif
                        </table>
                    </div>
                    <br><br><br><br><br>
                    <div class="ekor row" style="border-top:2px solid black">
                        <div class="col-8">
                            Terbilang : {{terbilang($sum)}}
                        </div>
                        <div class="col-4" style="font-size:22px; font-weight:bold; border-bottom:2px solid black;">
                            Total Rp. {{$sum}}
                        </div>
                    </div>

                    <br><br>

                    <div class="ttd row" style="text-align:center;">
                        <div class="col-3">
                            Yang Menerima <br><br><br>
                            Eli Syafyani
                        </div>
                        <div class="col-6"></div>
                        <div class="col-3">
                            Yang Menyetor <br><br><br>
                            Eli Syafyani
                        </div>
                    </div>

                </div>
                <div class="col-2"></div>
            </div>
            
        </section>
    </div>
</body>
<script>
  window.addEventListener("load", window.print());
</script>
</html>