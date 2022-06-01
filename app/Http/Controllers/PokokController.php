<?php

namespace App\Http\Controllers;

use App\Models\Pokok;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PokokController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = DB::select('SELECT x.nik, x.nama, SUM(x.spokok) as total, x.nik 
                            FROM (SELECT anggota2s.nik, anggota2s.nama, pokoks.spokok, anggota2s.id 
                                    FROM anggota2s, pokoks WHERE anggota2s.nik = pokoks.nik) AS x 
                            GROUP BY x.nik;');

        $data1 = DB::select('SELECT anggota2s.nik, pokoks.created_at FROM anggota2s, pokoks WHERE anggota2s.nik = pokoks.nik AND month(pokoks.created_at) = month(CURRENT_TIMESTAMP)');

        return view('simpananPokok', compact('data','data1'));
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
        $pokok = pokok::create([
            'spokok'=> 70000,
            'nik'=> $request->ida,
        ]);
        if($pokok){
            return redirect()->route('pokok.index')->with(['success' => 'Data Berhasil Disimpan!'])->with(['sw' => 70000])->with(['dari' => $request->nama]);
        }else {
            return redirect()->route('pokok.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    // Cetak Laporan
    public function report(Request $request)
    {
        $from =  $request->from . "-06";
        $to = $request->from + 1;
        $to = $to."-05";
        $data = DB::select("SELECT anggota2s.nama, pokoks.spokok, date_format(pokoks.created_at, '%Y-%m') AS waktu, anggota2s.nik
                            FROM anggota2s, pokoks 
                            WHERE anggota2s.nik = pokoks.nik AND date_format(pokoks.created_at, '%Y-%m') BETWEEN '$from' AND '$to'
                            ORDER BY pokoks.created_at;");

        $data1 = DB::select("SELECT x.nik, x.nama, SUM(x.spokok) as total, x.id 
                            FROM (SELECT anggota2s.nik, anggota2s.nama, pokoks.spokok, anggota2s.id 
                                    FROM anggota2s, pokoks 
                                    WHERE anggota2s.nik = pokoks.nik 
                                        AND date_format(pokoks.created_at, '%Y-%m') BETWEEN '$from' AND '$to') AS x 
                            GROUP BY x.id;");
        
        
        return view('laporanPokok', compact('data','from','to','data1'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Pokok  $pokok
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::select('SELECT * FROM anggota2s WHERE anggota2s.nik = '.$id);
        $detail1 = DB::select('SELECT * FROM pokoks WHERE pokoks.nik= '.$id);

        return view('detailPokok', compact('detail','detail1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Pokok  $pokok
     * @return \Illuminate\Http\Response
     */
    public function edit(Pokok $pokok)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Pokok  $pokok
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Pokok $pokok)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Pokok  $pokok
     * @return \Illuminate\Http\Response
     */
    public function destroy(Pokok $pokok)
    {
        //
    }
}
