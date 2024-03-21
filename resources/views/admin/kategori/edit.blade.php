@extends('layout')

@section('isi')
    <div class="container mt-5">
        <h2>Form Edit Category</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif


       
           
       <form class="mt-4" action="{{$cate->slug}}" method="POST">
           @csrf
           @method('put')
           <div class="mb-3">
               <label for="name" class="form-label">Name Category</label>
               <input type="text" class="form-control" value="{{$cate->name}}" name="name" id="name"
                   placeholder="Name Category">
           </div>
           <button type="submit" class="btn btn-primary">Submit</button>
       </form>
       
    

    </div>
@endsection
