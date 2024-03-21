@extends('layout')

@section('isi')
    <style>
        .card {
            border: solid 2px;
            color: #fff;
            padding: 20px 40px;
            width: 320px;
            height: 150px;
        }

        .card.book {
            background-color: teal;
        }

        .card.category {
            background-color: rebeccapurple;
        }

        .card.user {
            background-color: blue;
        }

        .card i {
            font-size: 80px;
        }

        .card-desc {
            font-size: 25px;

        }

        .card-count {
            font-size: 25px;
        }
    </style>
    <div class="container">
        <div class="row mt-4">

            <div class="col-lg-4">
                <div class="card book">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-book"></i></div>
                        <div class="col-6 mt-3 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">Book</div>
                            <div class="card-count">{{ $books }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card category ">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-list-task"></i></div>
                        <div class="col-6 mt-3 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">Category</div>
                            <div class="card-count">{{ $categorys }}</div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-4">
                <div class="card user ">
                    <div class="row">
                        <div class="col-6"><i class="bi bi-people"></i></div>
                        <div class="col-6 mt-3 d-flex flex-column justify-content-center align-items-end">
                            <div class="card-desc">User</div>
                            <div class="card-count">{{ $user }}</div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="mt-4">
            <h3>Data Peminjaman</h3>
        </div>
        <table id="peminjaman" class="table" border="1px">
            <thead>
                <tr>
                    <th scope="col">No</th>
                    <th scope="col">User</th>
                    <th scope="col">Book Tittle</th>
                    <th scope="col">Rent Date</th>
                    <th scope="col">Return Date</th>
                    <th scope="col">Actual Return Date</th>
                    <th scope="col">Status</th>
                </tr>
            </thead>
            <tbody>

            </tbody>
        </table>
        <script src="/datatable/datatables.min.js"></script>
        <script>
            $('#peminjaman').DataTable({

            });
        </script>
    </div>
@endsection
