<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="/assets/css/bootstrap-min.css">
    <script src="/assets/css/bootstrap-min.js"></script>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Login | Perpustakaan</title>
</head>
<body>
    <div id="main" class="d-flex align-items-center vh-100">
        <div class="container">
            <div class="card shadow m-auto" style="width: 400px">
                <div class="card-body">
                    <h4 class="h4">Selamat Datang</h4>
                    @if (session('status'))
                        <div class="alert alert-danger" role="alert">
                            {{ session('message') }}
                        </div>
                    @endif
                    
                    <form action="{{ url('login') }}" method="POST">
                        @csrf
                        <div class="mb-3">
                            <label for="email" class="form-label">Email</label>
                            <input type="email" class="form-control" name="email" id="email"
                                placeholder="Email" required autofocus>
                            @error('email')
                                <div class="form-text">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <div class="mb-3">
                            <label for="password" class="form-label">Password</label>
                            <input type="password" class="form-control" name="password" id="password"
                                placeholder="Password" required>
                            @error('password')
                                <div class="form-text">
                                    {{ $message }}
                                </div>
                            @enderror
                        </div>
                        <button class="btn form-control btn-primary mb-2">Login</button>
                        <button class="btn form-control btn-outline-success mb-2" type="reset">Batal</button>
                        <div>
                            <p>Belum punya akun?<a href="{{url('register')}}"> Daftar Sekarang</a></p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
      </div>
</body>
</html>