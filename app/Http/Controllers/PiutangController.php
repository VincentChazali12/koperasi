<?php

namespace App\Http\Controllers;

use App\Models\Piutang;
use App\Models\PiutangMaster;
use App\Models\Anggota;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class PiutangController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        // $piutangs=DB::select('SELECT piutangs.* , anggotas.nama FROM piutangs, anggotas WHERE piutangs.id_anggota
        // = anggotas.nik');
        // $anggota = DB::select('SELECT id, nama, nik FROM anggotas');
        // return view('piutang', compact('piutangs','anggota'));
        $piutangs=DB::select('SELECT piutang_masters.* , anggotas.nama FROM piutang_masters, anggotas WHERE piutang_masters.id_anggota
        = anggotas.nik');
        $anggota = DB::select('SELECT id, nama, nik FROM anggotas');
        return view('piutang', compact('piutangs','anggota'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $pinjaman=$request->usulan;
        // $angsuran_jasa=round($pinjaman*(0.18/12),-3);
        // $angsuran_total=round($pinjaman*(0.18/12)/(1-(pow((1+(0.18/12)),(-60)))),-3);
        // $angsuran_pokok=round($angsuran_total-$angsuran_jasa,-2);
        // $sisa = round($pinjaman-$angsuran_pokok);
        // $nik = explode(' ', $request->ida)[0];
        // $piutang = piutang::create([
        //     'usulan'=> $request->usulan,
        //     'angsuran_pokok'=>$angsuran_pokok,
        //     'angsuran_jasa'=>$angsuran_jasa,
        //     'angsuran_total'=>$angsuran_total,
        //     'sisa'=> $sisa,
        //     'waktu'=>$request->waktu,
        //     'ket'=>"Belum Bayar",
        //     'id_anggota'=> $nik,
        // ]);
        // if($piutang){
        //     return redirect()->route('pokok.index')->with(['success' => 'Data Berhasil Disimpan!']);
        // }else {
        //     return redirect()->route('pokok.index')->with(['error' => 'Data Gagal Disimpan!']);
        // }
        
        $pinjaman=$request->usulan;
        $angsuran_jasa=round($pinjaman*(0.18/12),-3);
        $angsuran_total=round($pinjaman*(0.18/12)/(1-(pow((1+(0.18/12)),(-60)))),-3);
        $angsuran_pokok=round($angsuran_total-$angsuran_jasa,-2);
        $sisa = round($pinjaman-$angsuran_pokok);
        $nik = explode(' ', $request->ida)[0];
        $piutangmaster = piutangmaster::create([
            'usulan'=> $pinjaman,
            'sisa'=> $pinjaman,
            'waktu'=>$request->waktu,
            'status'=>"Aktif",
            'id_anggota'=>$nik,
        ]);
        $piutang = piutang::create([
            'usulan'=> $request->usulan,
            'angsuran_pokok'=>0,
            'angsuran_jasa'=>0,
            'angsuran_total'=>0,
            'sisa'=> $pinjaman,
            'waktu'=>$request->waktu,
            'ket'=>"Belum Bayar",
            'id_piutang'=> $piutangmaster->id,
        ]);
        
        if($piutang){
            return redirect()->route('piutang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('piutang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::select('SELECT * FROM piutangs WHERE piutangs.id_piutang = '.$id);
        $detail1 = DB::select('SELECT * FROM anggotas WHERE anggotas.nik= '.$id);

        return view('detailPiutang', compact('detail','detail1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request)
    {
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $ids)
    {
        $pinjaman=$request->usulan;
        $angsuran_jasa=round($pinjaman*(0.18/12),-3);
        $angsuran_total=round($pinjaman*(0.18/12)/(1-(pow((1+(0.18/12)),(-60)))),-3);
        $angsuran_pokok=round($angsuran_total-$angsuran_jasa,-2);
        $sisa = round($pinjaman-$angsuran_pokok);
        $id=$request->ida;
        $waktu=$request->waktu;
        $waktubaru=$waktu-1;
        $piutang = piutang::create([
            'usulan'=> $request->usulan,
            'angsuran_pokok'=>$angsuran_pokok,
            'angsuran_jasa'=>$angsuran_jasa,
            'angsuran_total'=>$angsuran_total,
            'sisa'=> $sisa,
            'waktu'=>$waktubaru,
            'ket'=>"Sudah Bayar",
            'id_piutang'=> $request->ida,
        ]); 
        $piutangmaster = piutangmaster::findOrFail($ids);
        $piutangmaster->update([
            'sisa'=>$sisa,
            'waktu'=>$waktubaru,
        ]);
        if($piutangmaster){
            return redirect()->route('piutang.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('piutang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function destroy(Piutang $piutang)
    {
        //
    }
}
