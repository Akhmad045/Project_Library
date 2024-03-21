<?php

namespace App\Http\Controllers;

use App\Models\Book;
use App\Models\Categories;
use Illuminate\Http\Request;

class BookController extends Controller
{
    public function book(){
        $book = Book::all();
        return view('admin.buku.index',['books' => $book]);
    }

    public function add(){
        $categories = Categories::all();

        return view('admin.buku.add',['cate' =>$categories]);
    }
    
    public function add_book(Request $request) {
        $valid = $request->validate([
            'judul' => 'required|unique:books|max:255',
            'penulis' => 'required|max:255',
            'penerbit' => 'required|max:255',
            'tahunTerbit' => 'required|max:4',
        ]);
        $namaCover = '';
        if ($request->file('image')) {

            $cover = $request->file('image');
            $namaCover = $request->judul . "_" . date('ymd-His') . "." . $cover->getClientOriginalExtension();
            $cover->move('coverBuku',$namaCover);
        }
        $request['cover'] = $namaCover;
        $book = Book::create($request->all());
        $book->categories()->sync($request->categories);
        return redirect('dashboard/admin/buku')->with('status', 'Book Added Successfully');
    }

    public function edit($slug){
        $book = Book::where('slug', $slug)->first();
        $categories = Categories::all();
        return view('admin.buku.edit',['cate' =>$categories, 'books' => $book]);
    }

    public function edit_book(Request $request ,$slug) {
        $namaCover = '';
        if ($request->file('image')) {

            $cover = $request->file('image');
            $namaCover = $request->judul . "_" . date('ymd-His') . "." . $cover->getClientOriginalExtension();
            $cover->move('coverBuku',$namaCover);
        }
        $request['cover'] = $namaCover;

        $book = Book::where('slug', $slug)->first();
        $book = Book::where('slug', $slug)->first();
        if ($book) {
            $book->update($request->all());
        } 
        if ($book) {
            if ($request->categories) {
                $book->Categories()->sync($request->categories);
            }

            return redirect('dashboard/admin/buku')->with('status', 'Book Updated Successfully');
        } 
 
    }

    public function delete_buku($slug){
        $book = Book::where('slug' , $slug)->first();
        $book->delete();
        return redirect('dashboard/admin/buku')->with('status', 'Book Deleted Successfully');
    }
}
