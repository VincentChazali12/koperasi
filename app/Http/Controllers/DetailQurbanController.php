<?php

namespace App\Http\Controllers;

use App\Models\DetailQurban;
use Illuminate\Http\Request;

class detailQurbanController extends Controller
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
        $qurban = detailQurban::create([
            'id_qurban'=> $request->idq,
            'simpanan'=> $request->nominal,
            'bulan'=> $request->bulan,
        ]);
        if($qurban){
            return redirect()->route('qurban.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('qurban.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function store1(Request $request)
    {
        $nik = explode(' ', $request->ida)[0];

        $qurban = detailQurban::create([
            'id_qurban'=> $request->idq,
            'simpanan'=> $request->nominal,
            'bulan'=> $request->bulan,
        ]);
        if($qurban){
            return redirect()->route('qurban.show', $request->idq)->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('qurban.show', $request->idq)->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\DetailQurban  $detailQurban
     * @return \Illuminate\Http\Response
     */
    public function show(DetailQurban $detailQurban)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\DetailQurban  $detailQurban
     * @return \Illuminate\Http\Response
     */
    public function edit(DetailQurban $detailQurban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\DetailQurban  $detailQurban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, DetailQurban $detailQurban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\DetailQurban  $detailQurban
     * @return \Illuminate\Http\Response
     */
    public function destroy(DetailQurban $detailQurban)
    {
        //
    }
}
