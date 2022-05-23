<?php

namespace App\Http\Controllers;

use App\Models\Modal;
use App\Models\Anggota;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class ModalController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $modal = Modal::all();
        $anggota = DB::select('SELECT id, nama, nik FROM anggotas');

        return view('simpananModal',compact('modal','anggota'));
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
        $nik = explode(' ', $request->ida)[0];
        $pokok = modal::create([
            'nik'=> $nik,
            'jumlah'=> $request->jlh,
            'jasa'=> $request->jlh*0.0067,
            'adm'=> ceil(($request->jlh*0.0067)*0.05),
            'dibayar'=> ($request->jlh*0.0067)-(($request->jlh*0.0067)*0.05),
            'status'=> "Aktif",
            

        ]);
        if($pokok){
            return redirect()->route('modal.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('modal.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function show(Modal $modal)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function edit(Modal $modal)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Modal $modal)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Modal  $modal
     * @return \Illuminate\Http\Response
     */
    public function destroy(Modal $modal)
    {
        //
    }
}
