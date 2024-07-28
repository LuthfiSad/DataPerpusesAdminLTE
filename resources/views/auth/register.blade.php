<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    

    @include ('include.style')
</head>

<body class="register-page bg-body-secondary">
    <div class="register-box">
        <div class="card card-outline card-primary">
            <div class="card-header">
                <h1 class="mb-0 text-center"><b>Admin</b>LTE</h1>
            </div>
            <div class="card-body register-card-body">
                <p class="login-box-msg">Input your data to register to our website.</p>
                <form method="post" action="{{ route('register.store') }}">
                    @csrf
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input type="text" id="name" name="name" class="form-control @error('name') is-invalid @enderror" placeholder="Username" value="{{ old('name') }}">
                            <label for="name">Username</label>
                            @error('name')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-person"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input type="email" id="email" name="email" class="form-control @error('email') is-invalid @enderror" placeholder="Email" value="{{ old('email') }}">
                            <label for="email">Email</label>
                            @error('email')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-envelope"></span>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <div class="form-floating">
                            <input type="password" id="password" name="password" class="form-control @error('password') is-invalid @enderror" placeholder="Password">
                            <label for="password">Password</label>
                            @error('password')
                                <small class="text-danger">{{ $message }} </small>
                            @enderror
                        </div>
                        <div class="input-group-text">
                            <span class="bi bi-shield-lock"></span>
                        </div>
                    </div>
                    <div class="row my-2">
                        <div class="col-4 ms-auto">
                            <div class="d-grid gap-2">
                                <button type="submit" class="btn btn-primary">Register</button>
                            </div>
                        </div>
                    </div>
                </form>
                <p class="mb-0 text-center">Already have an account? <a href="{{ route('login') }}" class="text-center">Log in</a></p>
            </div>
        </div>
    </div>
    @include('include.script')
</body>

</html>
