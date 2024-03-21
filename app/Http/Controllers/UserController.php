<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function dashboard_user(Request $request){
        // $request->session()->flush();
        return view('user.index');
    }
    
    public function user(){
        $user = User::where('role_id', 3)->get();
        return view('admin.user.index',['users'=>$user]);
    }
}
