@extends('layout')

@section('isi')
    <div class="container">
        <div class="mt-4">
            <h3>Book</h3>
        </div>
        <div class="">
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
        <div class="mt-4 d-flex justify-content-end">
        <a href="{{ url('dashboard/admin/buku/tambah') }}" class="btn btn-primary">Add Book</a>
        </div>
        <table id="peminjaman" class="table" border="1px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Judul</th>
                    <th scope="col">Penulis</th>
                    <th scope="col">Penerbit</th>
                    <th scope="col">Tahun Terbit</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($books as $item)
                    <tr>
                        <td>{{$item->id}}</td>
                        <td>{{$item->judul}}</td>
                        <td>{{$item->penulis}}</td>
                        <td>{{$item->penerbit}}</td>
                        <td>{{$item->tahunTerbit}}</td>
                        <td>{{$item->status}}</td>
                        <td>
                    <a href="{{url('dashboard/admin/buku/edit/'.$item->slug)}}" class="btn btn-success">Edit</a>
                    <a href="{{url('dashboard/admin/buku/delete/'.$item->slug)}}" class="btn btn-danger" onclick="return confirm('Are you sure you want to delete this books?');">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <script src="/datatable/datatables.min.js"></script>
        <script>
            $('#peminjaman').DataTable({

            });
        </script>

    </div>
@endsection
