<?php

namespace App\Http\Controllers;

use App\Models\Anggota;
use App\Models\Pokok;
use Illuminate\Http\Request;

class AnggotaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota::all();
        return view('home', compact('anggota'));
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
        $anggota = anggota::create([
            'nik'=> $request->nik,
            'nama'=> $request->nama,
            'ttl' => $request->ttl,
            'alamat' => $request->alamat,
            'tempat_tugas'=> $request->tt,
            'telp'=> $request->telp,
            'norek'=>$request->norek,
            'status'=>"Aktif",
            
        ]);
        $pokok = pokok::create([
            'spokok'=> 25000,
            'nik'=> $anggota->nik,
            'created_at'=>null,
        ]);
        if($anggota){
            return redirect()->route('anggota.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('anggota.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota $anggota)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota $anggota)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Anggota $anggota)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota  $anggota
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota $anggota)
    {
        //
    }
}
