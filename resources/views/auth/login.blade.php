<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">

    <title>Login | {{ config('app.name') }}</title>

    <!-- Favicon -->
    <link rel="icon" href="{{ asset('images/favicon.png') }}">

    <!-- CoreUI CSS -->
    <link rel="stylesheet" href="{{ mix('css/app.css') }}" crossorigin="anonymous">

    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css">
</head>

<body class="d-flex align-items-center justify-content-center min-vh-100" style="background-color: #082858;">
    <div class="container">
        <div class="row mb-3">
            <div class="col-12 d-flex justify-content-center">
                <img 
    src="{{ asset('images/logo.png') }}" 
    alt="Logo" 
    style="width: 200px; height: 200px; border-radius: 50%; object-fit: cover;"
>
            </div>
        </div>

        <div class="row justify-content-center">
            <div class="col-md-5">
                @if(Session::has('account_deactivated'))
                    <div class="alert alert-danger" role="alert">
                        {{ Session::get('account_deactivated') }}
                    </div>
                @endif

                <div class="card p-4 border-0 shadow-sm">
                    <div class="card-body">
                        <form id="login" method="post" action="{{ url('/login') }}">
                            @csrf
                            <h1 class="text-center mb-3">Login</h1>
                            <p class="text-muted text-center mb-4">Sign In to your account</p>

                            <div class="input-group mb-3">
                                <span class="input-group-text"><i class="bi bi-person"></i></span>
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                                       name="email" value="{{ old('email') }}" placeholder="Email" required autofocus>
                                @error('email')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="input-group mb-4">
                                <span class="input-group-text"><i class="bi bi-lock"></i></span>
                                <input id="password" type="password"
                                       class="form-control @error('password') is-invalid @enderror"
                                       placeholder="Password" name="password" required>
                                @error('password')
                                <div class="invalid-feedback">{{ $message }}</div>
                                @enderror
                            </div>

                            <div class="row align-items-center">
                                <div class="col-4">
                                    <button id="submit" class="btn btn-primary px-4 d-flex align-items-center justify-content-center"
                                            type="submit">
                                        Login
                                        <div id="spinner" class="spinner-border text-light" role="status"
                                             style="height: 18px;width: 18px;margin-left: 5px;display: none;">
                                            <span class="sr-only">Loading...</span>
                                        </div>
                                    </button>
                                </div>
                                <div class="col-8 text-right">
                                    <a class="btn btn-link px-0" href="{{ route('password.request') }}">
                                        Forgot password?
                                    </a>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- CoreUI JS -->
    <script src="{{ mix('js/app.js') }}" defer></script>
    <script>
        const login = document.getElementById('login');
        const submit = document.getElementById('submit');
        const spinner = document.getElementById('spinner');

        login.addEventListener('submit', () => {
            submit.disabled = true;
            spinner.style.display = 'block';
        });
    </script>
</body>
</html>
