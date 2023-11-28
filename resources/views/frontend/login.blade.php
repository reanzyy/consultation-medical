<!DOCTYPE html>
<html lang="en" class="light-style customizer-hide" dir="ltr" data-theme="theme-default"
    data-assets-path="../assets/" data-template="vertical-menu-template-free">

<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>@yield('title', 'Login | SemestaCare')</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap');

        :root {
            --background-color: #F9F9F9;
            --primary-color: #528AC8;
            --secondary-color: #7FC8F8;
            --font-poppins: 'Poppins', sans-serif;
            --font-libre: 'Libre Baskerville', serif;
            --dark-color: #234874;
        }

        body{
            overflow: hidden;
        }

        .row input {
            border: 1px solid var(--primary-color);
            border-radius: 10px;
        }

        .row h4 {
            font-family: var(--font-libre);
            color: var(--primary-color);
        }

        .row p {
            font-family: var(--font-poppins);
            font-size: 12px;
            font-weight: 500;
            color: var(--dark-color);
        }

        .row label {
            font-family: var(--font-poppins);
            font-size: 12px;
            font-weight: bold;
            text-transform: capitalize;
            color: var(--dark-color);
        }
    </style>
    @include('layouts.partials.head')
    <link rel="stylesheet" href="../assets/vendor/css/pages/page-auth.css" />
</head>

<body>
    <section>
        <div>
            <div class="row">
                <x-alert />
                <div class="col-md-7 p-0">
                    <div class="image"
                        style="background: url({{ asset('/assets/img/illustrations/login-image.png') }}); background-postion:cover; background-repeat: no-repeat; height:100vh; width: 100%;">
                        <a href="" class="app-brand-link gap-2">
                            <img src="{{ asset('/assets/img/favicon/logo.png') }}" draggable="false" width="50"
                                class="m-5">
                        </a>
                    </div>
                </div>
                <div class="col-md-4 d-flex align-items-center justify-content-start">
                    <div>
                        <h4 class="mb-2">Log in</h4>
                    <p class="mb-4">Welcome back,please login to your account!</p>
                    <form class="mb-3" action="{{ route('frontend.loginUser.process') }}" method="post">
                        @csrf
                        <div class="mb-3" style="width: 300px">
                            <label for="email" class="form-label">Email</label>
                            <input type="text" class="form-control" name="email" placeholder="Enter email"
                                value="{{ old('username', request()->username) }}" required />
                            <div class="invalid-feedback @error('email') is-invalid @enderror">
                                @error('email')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <label class="form-label" for="password">Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Enter password"
                                required />
                            <div class="invalid-feedback @error('password') is-invalid @enderror">
                                @error('password')
                                    {{ $message }}
                                @enderror
                            </div>
                        </div>
                        <div class="mb-3">
                            <button class="btn d-grid w-100 text-white" style="background-color: var(--primary-color)"
                                type="submit">Login</button>
                        </div>
                        <div class="d-flex gap-1">
                            <p>Don't have any account?</p>
                            <a href="{{ route('frontend.register') }}" class="fw-bold" style="font-size: 12px;">Register
                                here</a>
                        </div>
                    </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <script src="../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../assets/vendor/libs/popper/popper.js"></script>
    <script src="../assets/vendor/js/bootstrap.js"></script>
    <script src="../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../assets/vendor/js/menu.js"></script>
    <script src="../assets/js/main.js"></script>
</body>

</html>
