<?php

namespace App\Http\Controllers;

use App\Models\Categories;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    public function category(){
        $c = Categories::all();
        return view('admin.kategori.index',['cate'=>$c]);
    }

    public function index_category(){
        return view('admin.kategori.tambah');
    }
    public function store_category(Request $request){
        $valid = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $cate = Categories::create($request->all());
        return redirect('dashboard/admin/kategori')->with('status', 'Category Added Successfully');

    }

    public function edit($slug){
        $category = Categories::where('slug', $slug)->first();
        return view('admin.kategori.edit',['cate' => $category]);
    }

    public function edit_category(Request $request, $slug){
        $valid = $request->validate([
            'name' => 'required|unique:categories|max:255',
        ]);
        $category = Categories::where('slug', $slug)->first();
        $category->slug = null;
        $category->update($request->all());
        return redirect('dashboard/admin/kategori')->with('status', 'Category Updated Successfully');
    }
    public function delete($slug){
        $category = Categories::where('slug', $slug)->first();
        $category->delete();
        return redirect('dashboard/admin/kategori')->with('status', 'Category Deleted Successfully');
    
    }
}
