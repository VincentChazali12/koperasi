<?php

namespace App\Http\Controllers;

use App\Models\SimpananWajib;
use Illuminate\Http\Request;
use App\Models\Piutang;
use Illuminate\Support\Facades\DB;

class SimpananWajibController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
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
            'sisa'=> $sisa,
            'waktu'=>$request->waktu,
            'ket'=>"Sudah Bayar",
            'id_piutang'=> $request->ida,
        ]); 
        if($piutang){
            return redirect()->route('piutang.show',$request->ida)->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('piutang.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function show(SimpananWajib $simpananWajib)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function edit(SimpananWajib $simpananWajib)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, SimpananWajib $simpananWajib)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\SimpananWajib  $simpananWajib
     * @return \Illuminate\Http\Response
     */
    public function destroy(SimpananWajib $simpananWajib)
    {
        //
    }
}
