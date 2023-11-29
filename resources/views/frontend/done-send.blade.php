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
    #done-sending {
    display: flex;
    justify-content: center;
    align-items: center;
    height: 100vh;
    flex-direction: column;
    }

    #done-sending a {
        text-decoration: none;
        color: white;
        background-color: #528AC8;
        padding: 0.7rem 3rem;
        font-size: 17px;
        border-radius: 10px;
    }
    </style>
</head>

<body>
    <section id="done-sending">
        <img src="{{ URL::asset('assets/img/favicon/done.png') }}" class="d-block mx-auto">
        <p style="margin-bottom: 0;color: #528AC8" class="fs-4 fw-bold text-center">
            Your form has been completely sent
        </p>
        <p class="text-center" style="color: #234874">
            Please wait until the doctor sends the form back to you.
        </p>
        <a href="{{ route('frontend.index') }}" class="button-done text-center">Selesai</a>
</section>
</body>
</html>
