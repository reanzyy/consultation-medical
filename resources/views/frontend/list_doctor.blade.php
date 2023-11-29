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
    <link rel="stylesheet" href="{{ url('/assets/css/app.css') }}" />
    <title>SemestaCare</title>
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
            </div>
        </div>
    </nav>
    <!-- End Navbar -->
    <section id="hero" class="mt-3">



        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-md-6">
                    <p
                        style="color: var(--primary-color); font-family: 'Libre Baskerville', serif; font-weight: 700; font-size: 30px; height: 28px;">
                        Make assignment with our doctor</p>
                </div>
                <div class="col-md-6">
                    <form action="{{ route('frontend.list') }}" method="">
                        <div class="input-group">
                            <input type="text" name="query" value="{{ old('query', request('query')) }}"
                                class="form-control" placeholder="Search...">
                            <div class="input-group-append">
                                <button class="btn btn-transparent text-primary" type="submit">
                                    <i class="fa-solid fa-magnifying-glass"></i>
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="row">
                @forelse ($doctors as $doctor)
                    <div class="col-md-4 mt-4">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex justify-content-center align-items-center mb-2">
                                    <div class=" card-doctor mb-2">
                                        <img src="{{ asset('/assets/img/icons/services/usman.png') }}" alt=""
                                            class="foto-doctor">
                                            <div class=" 
                                            @if($doctor->status == 'busy') busy-dot
                                            @elseif($doctor->status == 'available') available-dot
                                            @elseif($doctor->status == 'offline') offline-dot
                                            @endif">
                                        </div>
                                    </div>
                                    <div class="description " style="color: var(--primary-color);">
                                        <p class="nama-dokter">
                                        Dr. {{ explode(' ', $doctor->name)[0] }}
                                        </p>
                                        <p class="bidang-dokter">
                                        <i class="fa-solid fa-suitcase-medical"></i>
                                            {{ $doctor->specialist->name }}</p>
                                        <p class="bio-dokter">
                                            <i class="fa-solid fa-clock"></i>
                                            {{ \Carbon\Carbon::parse($doctor->start_time)->format('H:i') }} -
                                            {{ \Carbon\Carbon::parse($doctor->end_time)->format('H:i') }}
                                        </p>
                                        <div class="bio-dokter">
                                        <i class="fa-solid fa-hospital"></i>
                                            {{$doctor->hospital->name}}
                                        </div>
                                        <div class="rating-dokter">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M4.03402 14.459L5.0641 10.0059L5.07767 9.94721L5.03218 9.90778L1.57735 6.91253L6.14199 6.51629L6.202 6.51108L6.22545 6.4556L8.00001 2.25687L9.77456 6.4556L9.79802 6.51108L9.85803 6.51629L14.4227 6.91253L10.9678 9.90778L10.9223 9.94721L10.9359 10.0059L11.966 14.459L8.05166 12.0977L8.00001 12.0665L7.94836 12.0977L4.03402 14.459Z"
                                                    fill="#FFE45E" stroke="#FF6392" stroke-width="0.2" />
                                            </svg>
                                            5.0
                                        </div>
                                        @if ($doctor->status == 'busy')
                                        <button class="mt-4 busy-status">
                                        {{ $doctor->status }}</button>
                                        @endif
                                        @if ($doctor->status == 'available')
                                            <a class="text-white mt-4 available-status" href="{{ route('frontend.form-consul', $doctor->id) }}">
                                                {{ $doctor->status }}
                                            </a>
                                        @endif
                                        @if ($doctor->status == 'offline')
                                        <button class="mt-4 offline-status">
                                        {{ $doctor->status }}</button>
                                        @endif
                                        
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                @empty
                    <div class="d-flex align-items-center justify-content-center" style="height: 200px;">
                        <h5>Upss data is empty</h5>
                    </div>
                @endforelse
            </div>

        </div>
        <div class="custom-padding mt-4">
            <p class="mb-4 mt-4 mb-y" style="color: var(--primary-color);font-family: 'Libre Baskerville', serif;">
                How to contact a doctor online <br>
                Consulting with a SemestaCare doctor online can be done quickly. With just three easy steps, you can
                connect with the doctor you need. <br>
                There are specialist doctors in neurology, dentistry, and surgery available for you to contact 24 hours
                a day. <br>
                1.First step: Choose from the available best doctors and send a request to discuss your health needs or
                concerns. <br>
                2.Second step: Wait for the doctor. The doctor will approve your request (usually within one minute).
                <br>
                3.Final step: Talk to the doctor. Once you've connected with the doctor, please explain your condition
                calmly and clearly by asking the SemestaCare doctor. <br>
                No need to worry, all conversations and health diagnoses with the SemestaCare doctor will be kept
                secure. Even though it's done online, rest assured that your complaints and health discussions during
                the chat with the doctor at SemestaCare will remain confidential.
            </p>
        </div>
    </section>
    <section id="footer">
        <div class="container-fluid d-flex flex-column align-items-center footer pt-5">
            <h2 class="text-center sub-footer">
                <span>
                    <img src="{{ asset('/assets/img/icons/footer/footer-logo.png') }}" class="mx-2"
                        width="50">
                </span>
                SemestaCare
            </h2>
            <p class="text-center text-white px-5 my-4  text">SemestaCare: Talk to top doctors online. Anytime. Quality
                care, secure platform. </br>Specialists in neurology, dentistry, surgery.</p>
            <p class="text-center text-white border-top border-white mt-3 pt-3 w-100 text">Copyright © 2023 SemestaCare
            </p>

        </div>
    </section>
</body>
</html>
