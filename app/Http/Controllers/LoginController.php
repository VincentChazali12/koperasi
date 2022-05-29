<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('login.index',[
            'title'=>'Login',
            'active'=>'login'
        ]);
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
        $raya = user::create([
            'name'=> $request->nama,
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'status' => "Aktif",
        ]);
        return redirect()->route('login.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request,$id)
    {
        $email=$request->email;
        $password=$request->password;
        
        $emails = DB::select("SELECT email from users where email='$email'");
        $passwords=DB::select("SELECT users.password from users where users.password='$password'");
        $status=DB::select("SELECT status from users where email='$email'");
        if($emails and $passwords  ){
            return redirect()->route('anggota.index')->with(['successss' => 'Berhasil Login!']);
        }else{
            return view('Auth/login')->with(['error' => 'Email atau Password Salah!']);
        }
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
