<?php

namespace App\Http\Controllers;

use App\Models\Role;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Session;

class PetugasController extends Controller
{
    public function index(){
        $user = User::whereIn('role_id', [1,2])->get();
        return view('admin.petugas.index',['users'=>$user]);
    }

    public function add(Request $request){
        return view('admin.petugas.add');
    }

    public function add_petugas(Request $request) {
        $request->validate([
            'username' => 'required|unique:users|max: 255',
            'password' => 'required|max:255',
            'email' => 'required|unique:users',
            'fullname' => 'required| max: 255',
            'address' => 'required',
            'role' => 'required|in:admin,petugas' // Ensure the role is either 'admin' or 'petugas'
        ]);
    
        $request['password'] = Hash::make($request->password);
        $request['status'] = 'active'; // Set the status to 'active'
        $request['role_id'] = Role::where('name', $request->role)->first()->id; // Assign the role
    
        $user = User::create($request->all());
    
        Session::flash('status', 'succes');
        Session::flash('message', 'Register berhasil, mohon tunggu');
    
        return redirect('dashboard/admin/petugas');
    
    }
}
