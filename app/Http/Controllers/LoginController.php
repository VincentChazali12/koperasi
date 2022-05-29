<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;

class LoginController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        
        return view('Auth/login');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create(Request $request)
    {
        
        $credentials = $request->validate([
            'email'=>'required|email:dns',
            'password'=>'required'
        ]);
        
        if($credentials){
            $request->session()->regenerate();
            return redirect()->route('dashboards.index');
        }
        return back()->with('loginError','Login Failed!');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // $raya = user::create([
        //     'name'=> $request->nama,
        //     'email' => $request->email,
        //     'password' => Hash::make($request->password),
        //     'status' => "Aktif",
        // ]);
        // return redirect()->route('login.index');
        $validateddata=$request->validate([
            'name' =>'required|max:255',
            'email' =>'required|email|unique:users',
            'password'=>'required|min:8|max:255'
        
        ]);
        $validateddata['password'] = Hash::make($validateddata['password']);
            User::create($validateddata);
            $request->session()->flash('sucess','Registration successfull! Please login');
            return redirect()->route('login.index');
    }

    public function authenticate(Request $request){
            $credentials = $request->validate([
                'email'=>'required|email:dns',
                'password'=>'required'
            ]);

            if(Auth::attempt($credentials)){
                $request->session()->regenerate();
                return redirect()->route('dashboards');
            }
            return back()->with('loginError','Login Failed!');

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
        if($emails and $passwords ){
            return redirect()->route('anggota2.index')->with(['successss' => 'Berhasil Login!']);
        }else{
            return view('Auth/login')->with(['successss' => 'Email atau Password Salah!']);
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
