<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />

    <link rel="stylesheet" href="{{ url('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/theme-default.css') }}"
        class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/assets/css/demo.css') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
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

        * {
            /* box: border-box; */
            padding: 0;
            margin: 0;
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

        .btn-register {
            color: var(--primary-color);
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
            transition: 0.3s ease-in-out;
        }

        .btn-login {
            color: white;
            padding: 5px 15px;
            text-decoration: none;
            background-color: var(--primary-color);
            border: 1px solid var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
            transition: 0.3s ease-in-out;
        }

        .btn-login:hover {
            background: transparent;
            border: 1px solid var(--primary-color);
            color: var(--primary-color);
        }

        .btn-register:hover {
            background-color: var(--primary-color);
            color: white;
        }

        .btn-start {
            color: white;
            margin-top: 1000000rem;
            padding: 10px 20px;
            text-decoration: none;
            background-color: var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
            transition: 0.2s ease-in-out;
        }

        .btn-start:hover {
            color: white;
            background-color: var(--dark-color);
        }

        .card-doctor {
            background: linear-gradient(to right, #D8EEFF, #FDFCE0);
        }

        .center {
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .subtitle {
            font-family: var(--font-libre);
            color: var(--primary-color);
        }

        .title {
            color: #FF6392;
            font-weight: bold;
            text-align: center;
            font-size: 15px;
        }

        .subhero {
            color: var(--primary-color);
            font-family: 'Libre Baskerville', serif;
            font-size: 40px;
        }

        .title-services {
            color: var(--primary-color);
            font-family: 'Libre Baskerville', serif;
            font-size: 18px;
        }

        .doctor-name {
            color: #FF6392;
            font-weight: bold;
            text-align: center;
            font-size: 20px;
            margin-top: -20px
        }

        .text {
            color: var(--dark-color)
        }

        .footer{
            color: white;
            background-color: var(--primary-color);  
        }
        .sub-footer {
            font-family: var(--font-libre);
            color: white;
        }
    </style>
    <title>SemestaCare</title>
</head>

<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary" style="font-family: 'Poppins', sans-serif;">
        <div class="container-fluid px-5">
            <a class="navbar-brand" href="#">
                <img src="{{ asset('/assets/img/favicon/logo.png') }}" width="50">
            </a>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav" style="font-weight: 500;">
                    <li class="nav-item">
                        <a class="nav-link" href="#hero">Home</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#services">Services</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#doctors">Doctors</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#consultations">Consultations</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#testimonial">Testimonials</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#about">About Us</a>
                    </li>
                </ul>
            </div>
            @auth
            <div class="d-flex align-items-center gap-2">
                <p class="p-0 m-0">{{ Auth::user()->name }}</p>
                <img src="https://ui-avatars.com/api/?name={{ Auth::user()->name }}&color=528AC8" alt="" style="width: 35px; height: 35px;border: 2px solid var(--primary-color); border-radius: 50%;">
                <a href="{{ route('logout') }}" style="font-size: 18px"><i class="fa-solid fa-arrow-right-from-bracket"></i></a>
            </div>
            @endauth
            @guest                
            <div id="btn-navbar">
                <a href="{{ route('frontend.register') }}" class="btn-register">Register</a>
                <a href="{{ route('frontend.loginUser') }}" class="btn-login">Login</a>
            </div>
            @endguest
        </div>
    </nav>
    <!-- End Navbar -->
    <section id="hero" class="vh-100">
        <div class="container-fluid px-5">
            <div class="row align-items-center justify-content-between flex-md-row flex-column-reverse">
                <div class="col-md-6 col-12">
                    <p class="subhero" class="fw-bold">The Best Health Service In Your Hands</p>
                    <p class="mb-4 text">
                        In our consultations, we offer reliable health advice. Our team of experts is here
                        to help and provide you with the information you need. We're your trusted partners in making
                        informed decisions about your health.
                        Your well-being is our priority.</p>
                    <a href="{{ route('frontend.list') }}" class="btn-start">Start Consultation</a>
                </div>
                <div class="col-md-6 col-12 center">
                    <img src="{{ asset('/assets/img/illustrations/doctor-hero-section.png') }}" draggable="false"
                        class="img-fluid" alt="" style="width: 600px;">
                </div>
            </div>
        </div>
    </section>

    <section id="services" style="min-height: 100vh" class="center">
        <div class="container-fluid px-5 py-3">
            <p class="title">SERVICES</p>
            <h2 class="text-center mb-4 subtitle">Provides
                Our
                Best Services</h2>
            <div class="container-fluid px-5">
                <div class="row center gy-5">
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" style="width: 40px;"
                                    src="{{ asset('/assets/img/icons/services/cardiology.png') }}" alt="">
                                <p class="title-services">
                                    Cardiology</p>
                                <p class="text-center text">We're here for cardiology. We diagnose and treat conditions
                                    for
                                    your
                                    well-being.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" src="{{ asset('/assets/img/icons/services/neurology.png') }}"
                                    alt="">
                                <p class="title-services">
                                    Neurology</p>
                                <p class="text-center text">We're here to help with neurology. From the brain, we
                                    diagnose
                                    and
                                    treat
                                    conditions for your better health.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" src="{{ asset('/assets/img/icons/services/orthopedics.png') }}"
                                    alt="">
                                <p class="title-services">
                                    Orthopedics</p>
                                <p class="text-center text">We're here to help with orthopedic care. From fractures to
                                    arthritis,
                                    for improved mobility and comfortable</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" src="{{ asset('/assets/img/icons/services/surgery.png') }}"
                                    alt="">
                                <p class="title-services">
                                    Surgery</p>
                                <p class="text-center text">We're here to help through surgery. Our doctors are ready
                                    to
                                    diagnose
                                    and treat your conditions.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="doctors" style="min-height: 100vh" class="center">
        <div class="container-fluid px-5 py-3">
            <p class="title text-uppercase">
                Our Doctors</p>
            <h2 class="text-center mb-4 subtitle">Meet Our
                Professional Doctors</h2>
            <div class="container-fluid px-5">
                <div class="row center gy-5">

                    @for ($i = 0; $i < 4; $i++)
                        <div class="col-lg-3 col-md-6 col-12 center">
                            <div class="card card-doctor" style="width: 15rem;">
                                <div class="card-body">
                                    <img class="mx-auto d-block img-fluid" style="margin-bottom: -25px"
                                        src="{{ asset('/assets/img/doctors/dummy-1.png') }}" style="width: 12rem"
                                        alt="">
                                </div>
                                <div class="card-footer bg-white" style="height: 5rem">
                                    <p class="doctor-name">
                                        Dr. Lawson
                                    </p>
                                    <p class="text-center text" style="font-size: 12px; margin-top: -20px">Dentist</p>
                                    <div style="margin-top: -20px" class="text-center">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path
                                                d="M4.03402 14.459L5.0641 10.0059L5.07767 9.94721L5.03218 9.90778L1.57735 6.91253L6.14199 6.51629L6.202 6.51108L6.22545 6.4556L8.00001 2.25687L9.77456 6.4556L9.79802 6.51108L9.85803 6.51629L14.4227 6.91253L10.9678 9.90778L10.9223 9.94721L10.9359 10.0059L11.966 14.459L8.05166 12.0977L8.00001 12.0665L7.94836 12.0977L4.03402 14.459Z"
                                                fill="#FFE45E" stroke="#FF6392" stroke-width="0.2" />
                                        </svg>
                                        <span class="fw-bold" style="font-size: 12px;">
                                            5.0
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endfor

                </div>
            </div>
        </div>
    </section>

    <section id="consultations" style="min-height: 100vh" class="center">
        <div class="container-fluid py-5 px-5">
            <div class="row gy-4 flex-md-row flex-column-reverse">
                <div class="col-md-6 col-12">
                    <p class="title text-uppercase text-start">Consultation</p>
                    <h2 class="mb-4 subtitle">Consultation With Our Professional Doctor</h2>
                    <p class="text">Now you can make an appointment for consultation with your doctor anywhere and
                        anytime via online
                        booking which make it easier.</p>
                    <div class="text d-flex align-items-center gap-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.5em" fill="#33B792" viewBox="0 0 448 512">
                            <path
                                d="M96 32V64H48C21.5 64 0 85.5 0 112v48H448V112c0-26.5-21.5-48-48-48H352V32c0-17.7-14.3-32-32-32s-32 14.3-32 32V64H160V32c0-17.7-14.3-32-32-32S96 14.3 96 32zM448 192H0V464c0 26.5 21.5 48 48 48H400c26.5 0 48-21.5 48-48V192z" />
                        </svg>
                        Online schedule here
                    </div>
                    <div class="text d-flex align-items-center gap-4 mt-3 mb-4">
                        <svg xmlns="http://www.w3.org/2000/svg" height="1.1em" fill="#FFE45E" viewBox="0 0 640 512">
                            <path
                                d="M96 128a128 128 0 1 1 256 0A128 128 0 1 1 96 128zM0 482.3C0 383.8 79.8 304 178.3 304h91.4C368.2 304 448 383.8 448 482.3c0 16.4-13.3 29.7-29.7 29.7H29.7C13.3 512 0 498.7 0 482.3zM609.3 512H471.4c5.4-9.4 8.6-20.3 8.6-32v-8c0-60.7-27.1-115.2-69.8-151.8c2.4-.1 4.7-.2 7.1-.2h61.4C567.8 320 640 392.2 640 481.3c0 17-13.8 30.7-30.7 30.7zM432 256c-31 0-59-12.6-79.3-32.9C372.4 196.5 384 163.6 384 128c0-26.8-6.6-52.1-18.3-74.3C384.3 40.1 407.2 32 432 32c61.9 0 112 50.1 112 112s-50.1 112-112 112z" />
                        </svg>
                        Served directly by experts
                    </div>
                    <a href="{{ route('frontend.list') }}" class="btn-start">Start Consultation</a>
                </div>
                <div class="col-md-6 col-12">
                    <div style="position: relative; min-height: 450px">
                        <img class="img-fluid" src="{{ asset('assets/img/icons/consultation/checkup.png') }}"
                            alt="">
                        <img class="img-fluid" style="position: absolute; top: 150px; right: 0"
                            src="{{ asset('assets/img/icons/consultation/checkup2.png') }}" alt="">
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="testimonial" style="min-height: 100vh" >
        <div class="container-fluid  px-5">
        <p class="title text-uppercase">
                testimonials</p>
            <h2 class="text-center mb-5 subtitle">What Our Patients Say About Us</h2>
            <div class="container-fluid mt-3 px-5">
                <div class="row center gy-5">
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" style="margin-top: -3.5rem" src="{{ asset('/assets/img/doctors/jude.png') }}"
                                    alt="">
                                <p class="title-services text-center">
                                    Jude Bellingham</p>
                                <div class="d-flex flex-row gap-1 my-2">
                                    @for ($i = 0; $i < 3; $i++)
                                        <div style="margin-top: -20px" class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M4.03402 14.459L5.0641 10.0059L5.07767 9.94721L5.03218 9.90778L1.57735 6.91253L6.14199 6.51629L6.202 6.51108L6.22545 6.4556L8.00001 2.25687L9.77456 6.4556L9.79802 6.51108L9.85803 6.51629L14.4227 6.91253L10.9678 9.90778L10.9223 9.94721L10.9359 10.0059L11.966 14.459L8.05166 12.0977L8.00001 12.0665L7.94836 12.0977L4.03402 14.459Z"
                                                    fill="#FFE45E" stroke="#FF6392" stroke-width="0.2" />
                                            </svg>
                                        </div>
                                    @endfor
                                </div>

                                <p class="text-center text">i get tackled by gavi😅.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" style="margin-top: -3.5rem" src="{{ asset('/assets/img/doctors/ronaldo.png') }}"
                                    alt="">
                                <p class="title-services text-center">
                                    Ronaldo</p>
                                <div class="d-flex flex-row gap-1 my-2">
                                    @for ($i = 0; $i < 5; $i++)
                                        <div style="margin-top: -20px" class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M4.03402 14.459L5.0641 10.0059L5.07767 9.94721L5.03218 9.90778L1.57735 6.91253L6.14199 6.51629L6.202 6.51108L6.22545 6.4556L8.00001 2.25687L9.77456 6.4556L9.79802 6.51108L9.85803 6.51629L14.4227 6.91253L10.9678 9.90778L10.9223 9.94721L10.9359 10.0059L11.966 14.459L8.05166 12.0977L8.00001 12.0665L7.94836 12.0977L4.03402 14.459Z"
                                                    fill="#FFE45E" stroke="#FF6392" stroke-width="0.2" />
                                            </svg>
                                        </div>
                                    @endfor
                                </div>

                                <p class="text-center text">Suiiii🏋️‍♂️💪</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" style="margin-top: -3.5rem" src="{{ asset('/assets/img/doctors/haaland.png') }}"
                                    alt="">
                                <p class="title-services text-center">
                                    Erling Haaland</p>
                                <div class="d-flex flex-row gap-1 my-2">
                                    @for ($i = 0; $i < 4; $i++)
                                        <div style="margin-top: -20px" class="text-center">
                                            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                                viewBox="0 0 16 16" fill="none">
                                                <path
                                                    d="M4.03402 14.459L5.0641 10.0059L5.07767 9.94721L5.03218 9.90778L1.57735 6.91253L6.14199 6.51629L6.202 6.51108L6.22545 6.4556L8.00001 2.25687L9.77456 6.4556L9.79802 6.51108L9.85803 6.51629L14.4227 6.91253L10.9678 9.90778L10.9223 9.94721L10.9359 10.0059L11.966 14.459L8.05166 12.0977L8.00001 12.0665L7.94836 12.0977L4.03402 14.459Z"
                                                    fill="#FFE45E" stroke="#FF6392" stroke-width="0.2" />
                                            </svg>
                                        </div>
                                    @endfor
                                </div>

                                <p class="text-center text">i love messi👌.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <section id="about" style="min-height: 100vh">
        <div class="container-fluid px-5 py-5 mb-5 ">
            <p class="title text-uppercase">
                about us</p>
            <h2 class="text-center mb-4 subtitle">Why You Should Choose Us?</br>Get Know About Us</h2>
            <div class="container-fluid px-5">
                <div class="row center gy-5">
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" style="width: 40px;"
                                    src="{{ asset('/assets/img/icons/about/pro.png') }}" alt="">
                                <p class="title-services">
                                All Professionals</p>
                                <p class="text-center text">We always ensure our doctors work well and serve professional.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" src="{{ asset('/assets/img/icons/about/secure.png') }}"
                                    alt="">
                                <p class="title-services">
                                Fully Secure</p>
                                <p class="text-center text">All data and chat on our website is safely encrypted.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" src="{{ asset('/assets/img/icons/about/happy.png') }}"
                                    alt="">
                                <p class="title-services">
                                Happy Patients</p>
                                <p class="text-center text">We always ensure our patients are happy with the services we provide.</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-3 col-md-6 col-12 center">
                        <div class="card px-3 py-2" style="width: 15rem;">
                            <div class="card-body d-flex flex-column align-items-center">
                                <img class="mb-2" src="{{ asset('/assets/img/icons/about/24hours.png') }}"
                                    alt="">
                                <p class="title-services">
                                24Hours Support</p>
                                <p class="text-center text">We will always help you when you need us at any time.</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <section id="footer">
        <div class="container-fluid d-flex flex-column align-items-center footer pt-5">
            <h2 class="text-center sub-footer">
                <span>
                    <img src="{{ asset('/assets/img/favicon/footer-logo.png') }}" class="mx-2" width="50">
                </span> 
                SemestaCare
            </h2>
            <p class="text-center text-white px-5 my-4  text">SemestaCare: Talk to top doctors online. Anytime. Quality care, secure platform. </br>Specialists in neurology, dentistry, surgery.</p>
            <p class="text-center text-white border-top border-white mt-3 pt-3 w-100 text">Copyright © 2023 SemestaCare </p>
            
        </div>
    </section>

    <script src="{{ url('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ url('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('/assets/vendor/js/bootstrap.js') }}"></script>
</body>

</html>
