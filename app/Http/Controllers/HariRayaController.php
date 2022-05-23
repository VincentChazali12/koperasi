<?php

namespace App\Http\Controllers;

use App\Models\HariRaya;
use App\Models\DetailHariRaya;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class HariRayaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $raya = DB::select('SELECT x.nik, x.nama, x.tahun, x.nominal, SUM(x.simpanan) as total, x.idq, x.status
                            FROM(SELECT anggotas.id as ida, anggotas.nama, anggotas.nik, hari_rayas.tahun, hari_rayas.id as idq, hari_rayas.nominal, hari_rayas.status, detail_hari_rayas.simpanan 
                                FROM anggotas,hari_rayas,detail_hari_rayas 
                                WHERE anggotas.nik = hari_rayas.nik 
                                    AND hari_rayas.id = detail_hari_rayas.id_hari_raya) as x 
                            GROUP BY x.idq;');
        $anggota = DB::select('SELECT id, nama, nik FROM anggotas');
        $data1 = DB::select('SELECT anggotas.nik, hari_rayas.created_at, detail_hari_rayas.id FROM anggotas, hari_rayas, detail_hari_rayas WHERE anggotas.nik = hari_rayas.nik AND hari_rayas.id=detail_hari_rayas.id_hari_raya AND detail_hari_rayas.bulan = month(CURRENT_TIMESTAMP)');

        return view('simpananHariRaya', compact('raya','anggota','data1'));
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
        $raya = hariraya::create([
            'nik'=> $nik,
            'tahun' => $request->thn,
            'nominal' => $request->nominal,
            'status' => "Aktif",
        ]);
        $detail = detailhariraya::create([
            'bulan' => date('m'),
            'id_hari_raya'=> $raya->id,
            'simpanan' => $request->nominal,
        ]);
        if($raya){
            return redirect()->route('hariraya.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('hariraya.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\HariRaya  $hariRaya
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $detail = DB::select('SELECT detail_hari_rayas.* FROM detail_hari_rayas, hari_rayas WHERE detail_hari_rayas.id_hari_raya = hari_rayas.id AND hari_rayas.id = '.$id.' ORDER BY detail_hari_rayas.bulan');
        $detail1 = DB::select('SELECT hari_rayas.tahun, hari_rayas.nominal, hari_rayas.status, anggotas.nik, anggotas.nama, hari_rayas.id FROM hari_rayas, anggotas WHERE hari_rayas.nik = anggotas.nik AND hari_rayas.id = '.$id);

        return view('detailHariRaya', compact('detail','detail1'));
    }

    public function surat(Request $request)
    {
        $from =  explode('/', $request->tahun)[0] . "-06";
        $to = explode('/', $request->tahun)[1]."-05";
        $data = DB::select("SELECT detail_hari_rayas.*, hari_rayas.nik
                            FROM detail_hari_rayas, hari_rayas 
                            WHERE detail_hari_rayas.id_hari_raya = hari_rayas.id 
                                AND hari_rayas.tahun = '$request->tahun' ");;

        $data1 = DB::select("SELECT x.nik, x.nama, x.tahun, x.nominal, SUM(x.simpanan) as total, x.idq, x.status
                            FROM(SELECT anggotas.id as ida, anggotas.nama, anggotas.nik, hari_rayas.tahun, hari_rayas.id as idq, hari_rayas.nominal, hari_rayas.status, detail_hari_rayas.simpanan 
                                FROM anggotas,hari_rayas,detail_hari_rayas 
                                WHERE anggotas.nik = hari_rayas.nik 
                                    AND hari_rayas.id = detail_hari_rayas.id_hari_raya AND hari_rayas.tahun='$request->tahun') as x 
                            GROUP BY x.idq;");
        
        
        return view('suratHariRaya', compact('data','from','to','data1'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\HariRaya  $hariRaya
     * @return \Illuminate\Http\Response
     */
    public function edit(HariRaya $hariRaya)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\HariRaya  $hariRaya
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, HariRaya $hariRaya)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\HariRaya  $hariRaya
     * @return \Illuminate\Http\Response
     */
    public function destroy(HariRaya $hariRaya)
    {
        //
    }
}
