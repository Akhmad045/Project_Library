@extends('layout')

@section('isi')
    <div id="main" class="d-flex align-items-center vh-100">
        <div class="container">
            <div class="card shadow m-auto" style="width: 400px">
                <div class="card-body">
                    <h4 class="h4">Daftarkan diri anda</h4>
                    @if ($errors->any())
                        <div class="alert alert-danger">
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    @if (session('status'))
                        <div class="alert alert-succes" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    <form action="{{ url('dashboard/admin/petugas/tambah') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="username" class="form-label">Username</label>
                            <input type="text" class="form-control" name="username" id="username" placeholder="Username"
                                autofocus>
                            @error('username')
                                <div class="form-text">
                                    {{ $message }}
                                </div>
                            @enderror
                            <div class="mb-3">
                                <label for="Password" class="form-label">Password</label>
                                <input type="password" class="form-control" name="password" id="password"
                                    placeholder="Password">
                                @error('Password')
                                    <div class="form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="email" class="form-label">Email</label>
                                <input type="email" class="form-control" name="email" id="email"
                                    placeholder="Email">
                                @error('email')
                                    <div class="form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="fullname" class="form-label">Fullname</label>
                                <input type="fullname" class="form-control" name="fullname" id="fullname"
                                    placeholder="Fullname">
                                @error('fullname')
                                    <div class="form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="address" class="form-label">Address</label>
                                <textarea name="address" id="address" class="form-control" rows="3"></textarea>
                                @error('address')
                                    <div class="form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <div class="mb-3">
                                <label for="role">Role</label>
                                <select name="role" id="role" class="form-control" required>
                                    <option value="admin">Admin</option>
                                    <option value="petugas">Petugas</option>
                                </select>
                                @error('role_id')
                                    <div class="form-text">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                            <button class="btn form-control btn-primary mb-2">Registrasi</button>
                            <button class="btn form-control btn-outline-success mb-2" type="reset">Batal</button>
                            <div>
                                <p>Sudah punya akun?<a href="{{ url('login') }}"> Login Sekarang</a></p>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
