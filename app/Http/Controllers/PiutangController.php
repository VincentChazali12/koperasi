<?php

namespace App\Http\Controllers;

use App\Models\Piutang;
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
        $piutang = Piutang::all();
        return view('piutang', compact('piutang'));
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
        $piutang = piutang::create([
            'usulan'=> $request->usulan,
            'sisa'=> ,
            'diberi'=>$request->pinj,
            'waktu'=>$request->waktu,
            'id_anggota'=> $request->ida,
        ]);
        if($piutang){
            return redirect()->route('pokok.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('pokok.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function show(Piutang $piutang)
    {
        $detail = DB::select('SELECT * FROM piutangs WHERE piutangs.id_anggota = '.$piutang);
        $detail1 = DB::select('SELECT * FROM anggotas WHERE anggotas.nik= '.$piutang);

        return view('detailPiutang', compact('detail','detail1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function edit(Piutang $piutang)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Piutang  $piutang
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Piutang $piutang)
    {
        //
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
