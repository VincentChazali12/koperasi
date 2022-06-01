<?php

namespace App\Http\Controllers;

use App\Models\Dashboard;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class DashboardController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        $totalanggota = DB::select("SELECT count(anggota2s.nik)as totala from anggota2s ");
        $totalpiutang = DB::select("SELECT sum(piutang_masters.sisa) as totalp from piutang_masters ");
        $totalsp = DB::select("SELECT sum(pokoks.spokok) as totalsp from pokoks ");
        $totalsq = DB::select("SELECT sum(qurbans.nominal)as totalsq from qurbans");
        $totalsh = DB::select("SELECT sum(hari_rayas.nominal)as totalsh from hari_rayas ");
        $totalsm = DB::select("SELECT sum(modals.jumlah)as totalsm from modals ");
        // $anggotanik=DB::select("SELECT nik from anggota2s");
        // $anggotanama=DB::select("SELECT nama from anggota2s where nik='$anggotanik'");
        // $simpananpokok=DB::select("SELECT sum(spokok) from pokoks where pokoks.nik = '$anggotanik'group by ($anggotanik)");
        // $simpananqurban=DB::select("SELECT nominal from qurbans where nik='$anggotanik'group by ($anggotanik)");
        // $simpananhariraya=DB::select("SELECT nominal from hari_rayas where nik='$anggotanik'group by ($anggotanik)");
        // $simpananmodal=DB::select("SELECT jumlah from modals where nik='$anggotanik'group by ($anggotanik)");
        // $totalpinjaman=DB::select("SELECT sum(usulan) from piutang_masters where piutang_masters.id_anggota='$anggotanik'group by ($anggotanik)");
        // $sisapinjaman=DB::select("SELECT sum(sisa) from piutang_masters where piutang_masters.id_anggota='$anggotanik'group by ($anggotanik)");
        return view('dashboard', compact('totalanggota','totalpiutang','totalsp','totalsq','totalsh','totalsm'));
        
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function edit(Dashboard $dashboard)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Dashboard $dashboard)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Dashboard  $dashboard
     * @return \Illuminate\Http\Response
     */
    public function destroy(Dashboard $dashboard)
    {
        //
    }
}
