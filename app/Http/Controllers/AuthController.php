<?php

namespace App\Http\Controllers;

use App\Models\Peminjam;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class AuthController extends Controller
{
    public function login(){
        return view('auth.login');
    }

    public function authlogin(Request $request){
        $cek = $request->validate([
            'email' => ['required'],
            'password' => ['required'],
        ]);
        
        // cek apakah login valid
        if (Auth::attempt($cek)) {
            // cek apakah user status active
        if (Auth::user()->status != 'active') {
            Auth::logout();
            $request->session()->invalidate();
            $request->session()->regenerateToken();
            
            Session::flash('status', 'failed');
            Session::flash('message', 'Akun anda belum aktif, mohon hubungi admin!');
            return redirect('login');
        }
        $request->session()->regenerate();
        if(Auth::user()->role_id == 1) {
            return redirect('dashboard/admin');
        }
        if(Auth::user()->role_id == 2) {
            return redirect('dashboard/admin');
        }
        if(Auth::user()->role_id == 3) {
            return redirect('dashboard/perpustakaan');
        }
        
    }
    Session::flash('status', 'failed');
    Session::flash('message', 'Login Invalid');
        return back();
    }
    
    public function register(Request $request){
        return view('auth.register');
    }

    public function index(Request $request) {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function register_user(Request $request) {
        $cek = $request->validate([
            'username' => 'required|unique:users|max:255',
            'password' => 'required|max:255',
            'email' => 'required|unique:users',
            'fullname' => 'required|max:255',
            'address' => 'required'
        ]);
        $request['password'] = Hash::make($request->password);
        
        $user = User::create($request->all());

        Session::flash('status', 'succes');
        Session::flash('message', 'Register berhasil, mohon tunggu untuk persetujuan admin ');
        return redirect('register');
    }

    
}
