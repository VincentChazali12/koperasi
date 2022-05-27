<?php

namespace App\Http\Controllers;

use App\Models\DetailHariRaya;
use Illuminate\Http\Request;

class DetailHariRayaController extends Controller
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
        $raya = detailHariRaya::create([
            'id_hari_raya'=> $request->idq,
            'simpanan'=> $request->nominal,
            'bulan'=> $request->bulan,
        ]);
        if($raya){
            return redirect()->route('hariraya.index')->with(['success' => 'Data Berhasil Disimpan!'])->with(['ss' => $request->nominal])->with(['dari' => $request->nama]);
        }else {
            return redirect()->route('hariraya.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    public function store1(Request $request)
    {
        $nik = explode(' ', $request->ida)[0];

        $raya = detailHariRaya::create([
            'id_hari_raya'=> $request->idq,
            'simpanan'=> $request->nominal,
            'bulan'=> $request->bulan,
        ]);
        if($raya){
            return redirect()->route('hariraya.show', $request->idq)->with(['success' => 'Data Berhasil Disimpan!'])->with(['dari' => explode(' ', $request->ida)[2]]);
        }else {
            return redirect()->route('hariraya.show', $request->idq)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailHariRaya  $detailHariRaya
     * @return \Illuminate\Http\Response
     */
    public function show(DetailHariRaya $detailHariRaya)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailHariRaya  $detailHariRaya
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailHariRaya $detailHariRaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailHariRaya  $detailHariRaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailHariRaya $detailHariRaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailHariRaya  $detailHariRaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailHariRaya $detailHariRaya)
    {
        //
    }
}
