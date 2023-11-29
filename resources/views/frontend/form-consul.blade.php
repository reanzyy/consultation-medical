<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css"
        integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA=="
        crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/assets/css/demo.css') }}" />
    <title>SemestaCare</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap');
        :root {
            --background-color: #F9F9F9;
            --primary-color: #528AC8;
            --secondary-color: #7FC8F8;
            --font-poppins: 'Poppins', sans-serif;
            --font-libre: 'Libre Baskerville', serif;
        }

        * {
            box-sizing: border-box;
            padding: 0;
            margin: 0;
        }

        .custom-padding {
            padding: 45px 100px 110px 103px;
            font-size: 14px;
        }

        .nav-link {
            color: var(--primary-color) !important;
            margin: 0 1rem;
        }

        #btn-navbar {
            gap: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
    </style>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-3" style="font-family: 'Poppins', sans-serif;">
        <div class="container-fluid">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/assets/img/favicon/logo.png') }}" alt="" style="width: 50px;height: 50px">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="font-weight: 500;">
                    <li class="nav-item">
                        <a class="nav-link" href="/" style="color: var(--primary-color)">
                            Home
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
        <div class="container-fluid px-5">
            <div class="row">
                <div class="card p-5">
                    <h4>Please fill the consultation form</h4>
                    <div class="card-body">
                        <form action="{{ route('frontend.form-consul.process') }}" method="post">
                            @csrf
                            <input type="text" value="{{ Auth::user()->id }}" name="user_id" hidden>
                        <input type="text" value="{{ $doctor->id }}" name="doctor_id" hidden>
                        <div class="form-group mb-2">
                            <label for="description" class="form-label">Name Doctor</label>
                            <input type="text" class="form-control" readonly value="{{ $doctor->name }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" class="form-label">Specialists</label>
                            <input type="text" class="form-control" readonly value="{{ $doctor->specialist->name }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" class="form-label">Price</label>
                            <input type="text" class="form-control" readonly value="{{ 'IDR. ' . number_format($doctor->price) }}">
                        </div>
                        <div class="form-group mb-2">
                            <label for="description" class="form-label">Things you want to consult on</label>
                            <textarea id="" class="form-control" name="description"></textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Send Formulir</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</body>
</html>
