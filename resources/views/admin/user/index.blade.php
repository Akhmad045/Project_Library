@extends('layout')

@section('isi')
    <div class="container">
        <div class="mt-4">
            <h3>Data User</h3>
        </div>


        <table id="user" class="table" border="1px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">Username</th>
                    <th scope="col">Email</th>
                    <th scope="col">Fullname</th>
                    <th scope="col">Address</th>
                    <th scope="col">Status</th>
                    <th scope="col">Action</th>
                </tr>
            </thead>
            <tbody>
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
            </tbody>
        </table>
        <script src="/datatable/datatables.min.js"></script>
        <script>
            $('#user').DataTable({

            });
        </script>

    </div>
@endsection