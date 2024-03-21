@extends('layout')

@section('isi')
    <div class="container">
        <h1 class="mt-4 ms-4">Category</h1>
        <div class="w-50 ms-4">
            @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @else
                @if (session('status'))
                    <div class="alert alert-primary">
                        {{ session('status') }}
                    </div>
                @endif
            @endif
        </div>
        <div class="mt-4 ms-4">
            <a href="{{ url('dashboard/admin/kategori/tambah') }}" class="btn btn-primary">Add Category</a>
        </div>
        <div class="my-5">

            <table class="table ms-4" style="width: 94%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Name</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($cate as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->name }}</td>
                        <td>

                            <a href="{{url('dashboard/admin/kategori/edit/'.$item->slug)}}" class="btn btn-success">Edit</a>
                            <a href="{{url('dashboard/admin/kategori/delete/'.$item->slug)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this category?');">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- Modal -->
    </div>
@endsection
