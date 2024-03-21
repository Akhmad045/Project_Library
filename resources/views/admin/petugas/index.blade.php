@extends('layout')

@section('isi')
    <div class="container">
        <h1 class="mt-4 ms-4">Data Petugas</h1>
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
            <a href="{{ url('dashboard/admin/petugas/tambah') }}" class="btn btn-primary">Add Petugas</a>
        </div>
        <div class="my-5">

            <table id="petugas" class="table ms-4" style="width: 94%;">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>Username</th>
                        <th>Email</th>
                        <th>Fullname</th>
                        <th>Address</th>
                        <th>Status</th>
                        <th>Action</th>
                    </tr>
                </thead>
                @foreach ($users as $item)
                    <tr>
                        <td>{{ $item->id }}</td>
                        <td>{{ $item->username }}</td>
                        <td>{{ $item->email }}</td>
                        <td>{{ $item->fullname }}</td>
                        <td>{{ $item->address }}</td>
                        <td>{{ $item->status }}</td>
                        <td>
                            <a href="" class="btn btn-success">Detail</a>
                            <a href="" class="btn btn-danger">Delete</a>
                        </td>
                    </tr>
                @endforeach
            </table>
        </div>
        <!-- Modal -->
    </div>
    <script src="/datatable/datatables.min.js"></script>
        <script>
            $('#petugas').DataTable({

            });
        </script>
@endsection
