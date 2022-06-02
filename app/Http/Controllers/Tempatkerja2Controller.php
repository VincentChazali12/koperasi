<?php

namespace App\Http\Controllers;

use App\Models\tempatkerja2;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
class Tempatkerja2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $show=DB::select("SELECT * from tempatkerjas where id='$request->ids'");
        return view('Updatetempatkerja',compact('show'));
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
     * @param  \App\Models\tempatkerja2  $tempatkerja2
     * @return \Illuminate\Http\Response
     */
    public function show(tempatkerja2 $tempatkerja2)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tempatkerja2  $tempatkerja2
     * @return \Illuminate\Http\Response
     */
    public function edit(tempatkerja2 $tempatkerja2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tempatkerja2  $tempatkerja2
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, tempatkerja2 $tempatkerja2)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tempatkerja2  $tempatkerja2
     * @return \Illuminate\Http\Response
     */
    public function destroy(tempatkerja2 $tempatkerja2)
    {
        //
    }
}
