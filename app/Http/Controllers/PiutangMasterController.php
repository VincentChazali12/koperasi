<?php

namespace App\Http\Controllers;

use App\Models\PiutangMaster;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Piutang;
class PiutangMasterController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
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
        $pinjaman=$request->usulan;
        $angsuran_jasa=round($pinjaman*(0.18/12),-3);
        $angsuran_total=round($pinjaman*(0.18/12)/(1-(pow((1+(0.18/12)),(-60)))),-3);
        $angsuran_pokok=round($angsuran_total-$angsuran_jasa,-2);
        $sisa = round($pinjaman-$angsuran_pokok);
        $piutang = piutang::create([
            'usulan'=> $request->usulan,
            'angsuran_pokok'=>$angsuran_pokok,
            'angsuran_jasa'=>$angsuran_jasa,
            'angsuran_total'=>$angsuran_total,
            'sisa'=> $pinjaman,
            'waktu'=>$request->waktu,
            'ket'=>"Belum Bayar",
            'id_piutang'=> $request->ida,
        ]); 
        if($piutang){
            return redirect()->route('piutang.show')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('piutang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\PiutangMaster  $piutangMaster
     * @return \Illuminate\Http\Response
     */
    public function show(PiutangMaster $piutangMaster)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\PiutangMaster  $piutangMaster
     * @return \Illuminate\Http\Response
     */
    public function edit(PiutangMaster $piutangMaster)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\PiutangMaster  $piutangMaster
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, PiutangMaster $piutangMaster)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\PiutangMaster  $piutangMaster
     * @return \Illuminate\Http\Response
     */
    public function destroy(PiutangMaster $piutangMaster)
    {
        //
    }
}
