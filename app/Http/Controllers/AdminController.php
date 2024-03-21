<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class AdminController extends Controller
{
    public function dashboard_admin(Request $request){
        $book = Book::count();
        $category = Categories::count();
        $usr = User::count();
        // $request->session()->flush();
        return view('admin.index',['books' => $book, 'categorys' => $category , 'user' => $usr ]);
    }
}
