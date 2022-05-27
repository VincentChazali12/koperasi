<?php

namespace App\Http\Controllers;

use App\Models\Qurban;
use App\Models\DetailQurban;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class QurbanController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $qurban = DB::select('SELECT x.nik, x.nama, x.tahun, x.nominal, SUM(x.simpanan) as total, x.idq, x.status
                            FROM(SELECT anggotas.id as ida, anggotas.nama, anggotas.nik, qurbans.tahun, qurbans.id as idq, qurbans.nominal, qurbans.status, detail_qurbans.simpanan 
                                FROM anggotas,qurbans,detail_qurbans 
                                WHERE anggotas.nik = qurbans.nik 
                                    AND qurbans.id = detail_qurbans.id_qurban) as x 
                            GROUP BY x.idq;');
        $anggota = DB::select('SELECT id, nama, nik FROM anggotas');
        $data1 = DB::select('SELECT anggotas.nik, qurbans.created_at, detail_qurbans.id FROM anggotas, qurbans, detail_qurbans WHERE anggotas.nik = qurbans.nik AND qurbans.id=detail_qurbans.id_qurban AND detail_qurbans.bulan = month(CURRENT_TIMESTAMP)');

        return view('simpananQurban', compact('qurban','anggota','data1'));
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
        $qurban = qurban::create([
            'nik'=> $nik,
            'tahun' => $request->thn,
            'nominal' => $request->nominal,
            'status' => "Aktif",
        ]);
        $detail = detailqurban::create([
            'bulan' => date('m'),
            'id_qurban'=> $qurban->id,
            'simpanan' => $request->nominal,
        ]);
        if($qurban){
            return redirect()->route('qurban.index')->with(['success' => 'Data Berhasil Disimpan!'])->with(['ss' => $request->nominal])->with(['dari' => explode(' ', $request->ida)[2]]);
        }else {
            return redirect()->route('qurban.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Qurban  $qurban
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::select('SELECT detail_qurbans.* FROM detail_qurbans, qurbans WHERE detail_qurbans.id_qurban = qurbans.id AND qurbans.id = '.$id.' ORDER BY detail_qurbans.bulan');
        $detail1 = DB::select('SELECT qurbans.tahun, qurbans.nominal, qurbans.status, anggotas.nik, anggotas.nama, qurbans.id FROM qurbans, anggotas WHERE qurbans.nik = anggotas.nik AND qurbans.id = '.$id);

        return view('detailQurban', compact('detail','detail1'));
    }

    public function surat(Request $request)
    {
        $from =  explode('/', $request->tahun)[0] . "-06";
        $to = explode('/', $request->tahun)[1]."-05";
        $data = DB::select("SELECT detail_qurbans.*, qurbans.nik
                            FROM detail_qurbans, qurbans 
                            WHERE detail_qurbans.id_qurban = qurbans.id 
                                AND qurbans.tahun = '$request->tahun' ");;

        $data1 = DB::select("SELECT x.nik, x.nama, x.tahun, x.nominal, SUM(x.simpanan) as total, x.idq, x.status
                            FROM(SELECT anggotas.id as ida, anggotas.nama, anggotas.nik, qurbans.tahun, qurbans.id as idq, qurbans.nominal, qurbans.status, detail_qurbans.simpanan 
                                FROM anggotas,qurbans,detail_qurbans 
                                WHERE anggotas.nik = qurbans.nik 
                                    AND qurbans.id = detail_qurbans.id_qurban AND qurbans.tahun='$request->tahun') as x 
                            GROUP BY x.idq;");
        
        
        return view('suratQurban', compact('data','from','to','data1'));
    }
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Qurban  $qurban
     * @return \Illuminate\Http\Response
     */
    public function edit(Qurban $qurban)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Qurban  $qurban
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Qurban $qurban)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Qurban  $qurban
     * @return \Illuminate\Http\Response
     */
    public function destroy(Qurban $qurban)
    {
        //
    }
}
