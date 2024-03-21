@extends('layout')

@section('isi')
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <div class="container mt-5">
        <h2>Form Edit Book</h2>
        @if ($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <form class="mt-4" action="{{ $books->slug }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="judul" class="form-label">Judul</label>
                <input type="text" class="form-control" name="judul" id="judul" value="{{ $books->judul }}"
                    required autofocus placeholder="Judul Buku">
            </div>
            <div class="mb-3">
                <label for="penulis" class="form-label">Penulis</label>
                <input type="text" class="form-control" name="penulis" id="penulis" required
                    value="{{ $books->penulis }}" placeholder="Penulis">
            </div>
            <div class="mb-3">
                <label for="penerbit" class="form-label">Penerbit</label>
                <input type="text" class="form-control" name="penerbit" id="penerbit" required
                    value="{{ $books->penerbit }}" placeholder="Penerbit">
            </div>
            <div class="mb-3">
                <label for="tahunTerbit" class="form-label">Tahun Terbit</label>
                <input type="number" class="form-control" name="tahunTerbit" id="tahunTerbit" required
                    value="{{ $books->tahunTerbit }}" placeholder="Tahun Terbit">
            </div>
           
            <div class="mb-3">
                <label for="kategori" class="form-label">Kategori</label>
                <select name="categories[]" id="category" class="form-control select-multiple" multiple>
                    @foreach ($cate as $item)
                        <option value="{{ $item->id }}">{{ $item->name }}</option>
                    @endforeach
                </select>
            </div>
            <div class="mb-3">
                <label for="image" class="form-label">Image</label>
                <input type="file" class="form-control" name="image" id="image" multiple>
            </div>
            <div class="mb-3">
                <label for="cover" class="form-label" style="display: block">Current Image</label>
                @if ($books->cover!='')
                    <img src="{{asset('/coverBuku/'.$books->cover)}}" alt="" width="300px">

                @else
                    <img src="{{asset('/image/cover.jpg')}}" alt="" width="300px">
                @endif
            </div>
            <div class="mb-3">
                <label for="currentCategory">Current Category</label>
                <ul>
                    @foreach ($books->categories as $item)
                        <li>{{$item->name}}</li>
                    @endforeach
                </ul>
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
        </form>
    </div>
    <script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script>
        $(document).ready(function() {
            $('.select-multiple').select2();
        });
    </script>
@endsection
