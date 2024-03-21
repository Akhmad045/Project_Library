@extends('layout')

@section('isi')
    <div class="container mt-5">
        <h2>Form Add Category</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="mt-4" action="{{ url('dashboard/admin/kategori/tambah') }}" method="POST">
            @csrf
            <div class="mb-3">
                <label for="name" class="form-label">Name Category</label>
                <input type="text" class="form-control" name="name" id="name" required autofocus
                    placeholder="Name Category">
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
@endsection
