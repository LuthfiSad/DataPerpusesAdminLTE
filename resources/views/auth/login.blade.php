<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>

    @include('include.style')

</head>

<body class="login-page bg-body-secondary">
    <div class="login-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h1 class="mb-0 text-center"> <b>Admin</b>LTE</h1>
            </div>
            <div class="card-body login-card-body">
                <p class="login-box-msg">Sign in to start your session</p>
                @if (session()->has('loginfailed'))
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        {{ session('loginfailed') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                @if (session()->has('registersuccess'))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        {{ session('registersuccess') }}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                @endif
                <form method="post" action="{{ route('login.store') }}">
                    @csrf
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input id="loginEmail" type="email"
                                class="form-control @error('email') is-invalid @enderror" name="email"
                                placeholder="Email" value="{{ old('email') }}">
                            <label for="loginEmail">Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                        <div class="input-group-text"><span class="bi bi-envelope"></span></div>
                    </div>
                    <div class="input-group mb-2">
                        <div class="form-floating">
                            <input id="loginPassword" type="password"
                                class="form-control @error('password') is-invalid @enderror" name="password"
                                placeholder="Password">
                            <label for="loginPassword">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                        <div class="input-group-text"><span class="bi bi-lock-fill"></span></div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4 ms-auto">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Login</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mb-0 text-center">Don't have an account? <a href="{{ route('register') }}"
                        class="text-center">Register</a></p>
            </div>
        </div>
    </div>
    @include('include.script')
</body>

</html>
