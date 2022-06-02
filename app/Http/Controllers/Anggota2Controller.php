<?php

namespace App\Http\Controllers;

use App\Models\Anggota2;
use App\Models\tempatkerja;
use App\Models\Pokok;
use App\Models\Qurban;
use App\Models\HariRaya;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;

class Anggota2Controller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $anggota = Anggota2::all();
        $tempatkerja = tempatkerja::all();
        return view('anggota', compact('anggota','tempatkerja'));
    }

    public function updatee(Request $request)
    {
        $id=$request->ida;

        $anggota = Anggota2::findOrFail($id);
        $anggota->update([
            'status'=>'Keluar',
        ]);

        // $qurbans = Qurban::findOrFail($id);
        // $qurbans->update([
        //     'status'=>'Tidak aktif',
        // ]);

        // $harirayas = Hariraya::findOrFail($id);
        // $harirayas->update([
        //     'status'=>'Tidak Aktif',
        // ]);
        $pokok = DB::select("SELECT SUM(pokoks.spokok) as total FROM anggota2s, pokoks WHERE anggota2s.nik = pokoks.nik AND anggota2s.nik = '$request->ida'");
        $qurban = DB::select("SELECT SUM(detail_qurbans.simpanan) as total FROM qurbans, detail_qurbans, anggota2s WHERE qurbans.id = detail_qurbans.id_qurban AND qurbans.nik=anggota2s.nik AND anggota2s.nik = '$request->ida'");
        $hariraya = DB::select("SELECT SUM(detail_hari_rayas.simpanan) as total FROM hari_rayas, detail_hari_rayas, anggota2s WHERE hari_rayas.id = detail_hari_rayas.id_hari_raya AND hari_rayas.nik=anggota2s.nik AND anggota2s.nik = '$request->ida'");
        $ss = $qurban + $hariraya;
        $sp= 25000;
        $sw = $pokok;
        if ($anggota) {
            return redirect()->route('anggota2.index')->with(['successs' => 'Data Berhasil Diubah!'])->with(['sp'=>$sp])->with(['sw'=>$sw])->with(['dari'=>$anggota->nama])->with(['ss'=>$ss]);
        } else {
            return redirect()->route('anggota2.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        $id=$request->ida;

        $anggota = anggota2::findOrFail($id);
        $anggota->update([
            'status'=>'Keluar',
        ]);

        $qurbans = qurban::findOrFail($id);
        $qurbans->update([
            'status'=>'Tidak aktif',
        ]);

        $harirayas = hariraya::findOrFail($id);
        $harirayas->update([
            'status'=>'Tidak Aktif',
        ]);
        $pokok = DB::select("SELECT SUM(pokoks.spokok) as total FROM anggotas, pokoks WHERE anggotas.nik = pokoks.nik AND anggotas.nik = '$request->ida'");
        $qurban = DB::select("SELECT SUM(detail_qurbans.simpanan) as total FROM qurbans, detail_qurbans, anggotas WHERE qurbans.id = detail_qurbans.id_qurban AND qurbans.nik=anggotas.nik AND anggotas.nik = '$request->ida'");
        $hariraya = DB::select("SELECT SUM(detail_hari_rayas.simpanan) as total FROM hari_rayas, detail_hari_rayas, anggotas WHERE hari_rayas.id = detail_hari_rayas.id_hari_raya AND hari_rayas.nik=anggotas.nik AND anggotas.nik = '$request->ida'");
        $ss = $qurban + $hariraya;
        $sp= 25000;
        $sw = $pokok;
        if ($anggota) {
            return redirect()->route('anggota2.index')->with(['successs' => 'Data Berhasil Diubah!'])->with(['sp'=>$sp])->with(['sw'=>$sw])->with(['dari'=>$anggota->nama])->with(['ss'=>$ss]);
        } else {
            return redirect()->route('anggota2.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $date = $request->tanggallahir;
        $pecah = explode('-', $date);
        if($pecah[1]=='01'){
            $pecah[1]='Januari';
        }else if($pecah[1]=='02'){
            $pecah[1]='Febuari';
        }else if($pecah[1]=='03'){
            $pecah[1]='Maret';
        }else if($pecah[1]=='04'){
            $pecah[1]='April';
        }else if($pecah[1]=='05'){
            $pecah[1]='Mei';
        }else if($pecah[1]=='06'){
            $pecah[1]='Juni';
        }else if($pecah[1]=='07'){
            $pecah[1]='Juli';
        }else if($pecah[1]=='08'){
            $pecah[1]='Agustus';
        }else if($pecah[1]=='09'){
            $pecah[1]='September';
        }else if($pecah[1]=='10'){
            $pecah[1]='Oktober';
        }else if($pecah[1]=='11'){
            $pecah[1]='November';
        }else if($pecah[1]=='12'){
            $pecah[1]='Desember';
        }
        $tanggallahir=$pecah[2].' '.$pecah[1].' '.$pecah[0];

        $tempat=$request->tempat;
        $ttl=$tempat.", ".$tanggallahir;
        $anggota = anggota2::create([
            'nik'=> $request->nik,
            'nama'=> $request->nama,
            'ttl' => $ttl,
            'alamat' => $request->alamat,
            'tempat_tugas'=> $request->tt,
            'telp'=> $request->telp,
            'norek'=>$request->norek,
            'status'=>"Aktif",
            
        ]);
        $pokok = pokok::create([
            'spokok'=> 50000,
            'nik'=> $anggota->nik,
            'created_at'=>null,
        ]);
        $pokok1 = pokok::create([
            'spokok'=> 70000,
            'nik'=> $anggota->nik,
        ]);
        if($anggota){
            return redirect()->route('anggota2.index')->with(['success' => 'Data Berhasil Disimpan!'])->with(['sp'=>$pokok->spokok])->with(['sw'=>$pokok1->spokok])->with(['dari'=>$anggota->nama]);
        }else {
            return redirect()->route('anggota2.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }
    public function keluar(Request $request){

        $id=$request->ida;

        $anggota = Anggota2::findOrFail($id);
        $anggota->update([
            'status'=>'Keluar',
        ]);

        $qurbans = Qurban::findOrFail($id);
        $qurbans->update([
            'status'=>'Tidak aktif',
        ]);

        $harirayas = Hariraya::findOrFail($id);
        $harirayas->update([
            'status'=>'Tidak Aktif',
        ]);
        $pokok = DB::select("SELECT SUM(pokoks.spokok) as total FROM anggota2s, pokoks WHERE anggota2s.nik = pokoks.nik AND anggota2s.nik = '$request->ida'");
        $qurban = DB::select("SELECT SUM(detail_qurbans.simpanan) as total FROM qurbans, detail_qurbans, anggota2s WHERE qurbans.id = detail_qurbans.id_qurban AND qurbans.nik=anggota2s.nik AND anggota2s.nik = '$request->ida'");
        $hariraya = DB::select("SELECT SUM(detail_hari_rayas.simpanan) as total FROM hari_rayas, detail_hari_rayas, anggota2s WHERE hari_rayas.id = detail_hari_rayas.id_hari_raya AND hari_rayas.nik=anggota2s.nik AND anggota2s.nik = '$request->ida'");
        $ss = $qurban + $hariraya;
        $sp= 25000;
        $sw = $pokok;
        if ($anggota) {
            return redirect()->route('anggota2.index')->with(['successs' => 'Data Berhasil Diubah!'])->with(['sp'=>$sp])->with(['sw'=>$sw])->with(['dari'=>$anggota->nama])->with(['ss'=>$ss]);
        } else {
            return redirect()->route('anggota2.index')->with(['error' => 'Data Gagal Disimpan!']);
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Anggota2  $anggota2
     * @return \Illuminate\Http\Response
     */
    public function show(Anggota2 $anggota2)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Anggota2  $anggota2
     * @return \Illuminate\Http\Response
     */
    public function edit(Anggota2 $anggota2)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Anggota2  $anggota2
     * @return \Illuminate\Http\Response
     */
    // public function update(Request $request)
    // {
    //     // $id=$request->ida;
    //     /*
    //     $anggota = anggota2::findOrFail($id);
    //     $anggota->update([
    //         'status'=>'Keluar',
    //     ]);

    //     $qurbans = qurban::findOrFail($id);
    //     $qurbans->update([
    //         'status'=>'Tidak aktif',
    //     ]);

    //     $harirayas = hariraya::findOrFail($id);
    //     $harirayas->update([
    //         'status'=>'Tidak Aktif',
    //     ]);
    //     $pokok = DB::select("SELECT SUM(pokoks.spokok) as total FROM anggota2s, pokoks WHERE anggota2s.nik = pokoks.nik AND anggota2s.nik = '$request->ida'");
    //     $qurban = DB::select("SELECT SUM(detail_qurbans.simpanan) as total FROM qurbans, detail_qurbans, anggota2s WHERE qurbans.id = detail_qurbans.id_qurban AND qurbans.nik=anggota2s.nik AND anggota2s.nik = '$request->ida'");
    //     $hariraya = DB::select("SELECT SUM(detail_hari_rayas.simpanan) as total FROM hari_rayas, detail_hari_rayas, anggota2s WHERE hari_rayas.id = detail_hari_rayas.id_hari_raya AND hari_rayas.nik=anggota2s.nik AND anggota2s.nik = '$request->ida'");
    //     $ss = $qurban + $hariraya;
    //     $sp= 25000;
    //     $sw = $pokok;
    //     if ($anggota) {
    //         return redirect()->route('anggota2.index')->with(['successs' => 'Data Berhasil Diubah!'])->with(['sp'=>$sp])->with(['sw'=>$sw])->with(['dari'=>$anggota->nama])->with(['ss'=>$ss]);
    //     } else {
    //         return redirect()->route('anggota2.index')->with(['error' => 'Data Gagal Disimpan!']);
    //     }
    //     */

    //     $anggota = Anggota2::all();
    //     $tempatkerja = tempatkerja::all();
    //     return view('anggota', compact('anggota','tempatkerja'));
    // }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Anggota2  $anggota2
     * @return \Illuminate\Http\Response
     */
    public function destroy(Anggota2 $anggota2)
    {
        //
    }
}
