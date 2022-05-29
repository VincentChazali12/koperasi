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
        $totalanggota = DB::select("SELECT count(anggotas.nik)as totala from anggotas ");
        $totalpiutang = DB::select("SELECT sum(piutang_masters.sisa) as totalp from piutang_masters ");
        $totalsp = DB::select("SELECT sum(pokoks.spokok) as totalsp from pokoks ");
        $totalsq = DB::select("SELECT sum(qurbans.nominal)as totalsq from qurbans");
        $totalsh = DB::select("SELECT sum(hari_rayas.nominal)as totalsh from hari_rayas ");
        $totalsm = DB::select("SELECT sum(modals.jumlah)as totalsm from modals ");
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
