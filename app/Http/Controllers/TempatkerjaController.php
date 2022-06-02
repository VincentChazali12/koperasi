<?php

namespace App\Http\Controllers;

use App\Models\tempatkerja;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TempatkerjaController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $tk = tempatkerja::all();
        return view('kelolatempatkerja', compact('tk'));
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
        $tempatkerja = tempatkerja::create([
            'tempatkerja'=> $request->tempatkerja,
            'instansi'=> $request->instansi,
            
        ]);
        if($tempatkerja){
            return redirect()->route('tempatkerjas.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('tempatkerjas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\tempatkerja  $tempatkerja
     * @return \Illuminate\Http\Response
     */
    public function show()
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\tempatkerja  $tempatkerja
     * @return \Illuminate\Http\Response
     */
    public function edit(tempatkerja $tempatkerja)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\tempatkerja  $tempatkerja
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request,$id)
    {
        // $ids=$request->id;
        $tempatkerja=tempatkerja::findOrFail($id);
        $tempatkerja->update([
            'tempatkerja'=>$request->tempatkerja,
            'instansi'=>$request->instansi,
        ]);
        if($tempatkerja){
            return redirect()->route('tempatkerja.index')->with(['success' => 'Data Berhasil Disimpan!']);
        }else {
            return redirect()->route('tempatkerjas.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\tempatkerja  $tempatkerja
     * @return \Illuminate\Http\Response
     */
    public function destroy(tempatkerja $tempatkerja)
    {
        //
    }
}
