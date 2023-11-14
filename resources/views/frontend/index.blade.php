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
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Poppins:wght@400;500;600;700&display=swap');
        @import url('https://fonts.googleapis.com/css2?family=Libre+Baskerville:wght@400;700&display=swap');
        :root{
            --background-color: #F9F9F9;
            --primary-color: #528AC8;
            --secondary-color: #7FC8F8;
            --font-poppins: 'Poppins', sans-serif;
            --font-libre: 'Libre Baskerville', serif;
            --dark-color: #234874; 
        }
        *{
          /* box-sizing: border-box; */
          padding: 0;
          margin: 0;
        }
        .nav-link{
            color: var(--primary-color) !important;
            margin: 0 1rem;
        }
        #btn-navbar{
            gap: 1rem;
            display: flex;
            justify-content: center;
            align-items: center;
        }
        .btn-register{
            color: var(--primary-color);
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
        }
        .btn-login{
            color: white;
            padding: 5px 15px;
            text-decoration: none;
            background-color: var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
        }
        .btn-login:hover{
            color: white;
        }
        .btn-register:hover{
            background-color: var(--primary-color);
            transition: 0.3s ease-in-out;
            color: white;
        }
        .btn-start{
            color: white;
            margin-top: 1000000rem;
            padding: 10px 20px;
            text-decoration: none;
            background-color: var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
        }
        .btn-start:hover{
          color: white;
          background-color: var(--dark-color);
        }
        .card-doctor{
          background: linear-gradient(to right, #D8EEFF, #FDFCE0);
        }
      </style>
    <title>SemestaCare</title>
</head>
    
<body>
    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg bg-body-tertiary px-3" style="font-family: 'Poppins', sans-serif;">
        <div class="container-fluid">
          <a class="navbar-brand" href="#">
            <img src="{{ asset('/assets/img/favicon/logo.png') }}" alt="" style="width: 50px;height: 50px">
          </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarNav">
            <ul class="navbar-nav" style="font-weight: 500;">
              <li class="nav-item">
                <a class="nav-link" href="#" style="color: var(--primary-color)">
                    Home
                </a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Services</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Doctors</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" href="#">Consultations</a>
              </li>
            </ul>
        </div>
        <div id="btn-navbar">
            <a href="" class="btn-register">Register</a>
            <a href="" class="btn-login">Login</a>
        </div>
        </div>
      </nav>
      <!-- End Navbar -->
      <section id="hero">
        <div class="container-fluid px-5">
          <div class="row align-items-center justify-content-between">
            <div class="col-md-6">
              <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 40px;">The Best <br> Health Service <br> In Your Hands</p>
                <p class="mb-4">In our consultations, we offer reliable health advice. Our team of experts is here to help and provide you with the information you need. We're your trusted partners in making informed decisions about your health. 
                  Your well-being is our priority.</p>
                  <a href="" class="btn-start">Start Consultation</a>
            </div>
            <div class="col-md-5">
              <img src="{{ asset('/assets/img/illustrations/doctor-hero-section.png') }}" alt="" style="width: 520px; height: 520px;">
            </div>
          </div>
        </div>
      </section>
      <section id="service">
        <div class="container-fluid px-5 py-3 d-flex flex-column gap-3">
          <p style="color: #FF6392; font-weight: bold;text-align:center; font-size: 15px;">SERVICES</p>
          <h2 class="text-center " style="font-family: var(--font-libre); color: var(--primary-color); ">Provides Our Best Services</h2>
          <div class="d-flex justify-content-center align-items-center gap-3 mt-2">
                <div class="card px-3 py-2" style="width: 15rem">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" style="width: 40px;"  src="{{ asset('/assets/img/icons/services/cardiology.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Cardiology</p>
                    <p class=" text-center">We're here for cardiology. We diagnose and treat conditions for your well-being.</p>
                  </div>
                </div>
                <div class="card px-3 py-2" style="width: 15rem;">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" src="{{ asset('/assets/img/icons/services/neurology.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Neurology</p>
                    <p class=" text-center">We're here to help with neurology. From the brain, we diagnose and treat conditions for your better health.</p>
                  </div>
                </div>
                <div class="card px-3 py-2" style="width: 15rem;">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" src="{{ asset('/assets/img/icons/services/orthopedics.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Orthopedics</p>
                    <p class=" text-center">We're here to help with orthopedic care. From fractures to arthritis, for improved mobility and comfortable</p>
                  </div>
                </div>
                <div class="card px-3 py-2" style="width: 15rem;">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" src="{{ asset('/assets/img/icons/services/surgery.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Surgery</p>
                    <p class="text-center">We're here to help through surgery. Our doctors are ready to diagnose and treat your conditions.</p>
                  </div>
                </div>
          </div>
          <div class="container my-5 py-5 ">
          </div>
        </div>
      </section>
      <section id="doctors">
        <div class="container-fluid px-5 py-3 d-flex flex-column gap-3">
          <p style="color: #FF6392; font-weight: bold;text-align:center; font-size: 15px;" class="text-uppercase">Our Doctors</p>
          <h2 class="text-center" style="font-family: var(--font-libre); color: var(--primary-color);">Meet Our Professional Doctors</h2>
          <div class="d-flex justify-content-center align-items-center gap-3">
                <div class="card card-doctor" style="width: 15rem; height: 25rem">
                <div class="card-body">
                  <img class="mx-auto " src="{{ asset('/assets/img/doctors/dummy-1.png') }}" style="width: 12rem" alt="">
                </div>
                <div class="card-footer  bg-white">
                  <p style="color: #FF6392; font-weight: bold;text-align:center; font-size: 20px; margin-bottom: -5px;">Dr. Lawson</p>
                  <small class="text-center" style="text-align: center">Dentist</small>
                </div>
                  
                </div>
                <div class="card px-3 py-2" style="width: 15rem; height: 18rem">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" src="{{ asset('/assets/img/icons/services/neurology.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Neurology</p>
                    <p class=" text-center">We're here to help with neurology. From the brain, we diagnose and treat conditions for your better health.</p>
                  </div>
                </div>
                <div class="card px-3 py-2" style="width: 15rem; height: 18rem">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" src="{{ asset('/assets/img/icons/services/orthopedics.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Orthopedics</p>
                    <p class=" text-center">We're here to help with orthopedic care. From fractures to arthritis, for improved mobility and comfortable</p>
                  </div>
                </div>
                <div class="card px-3 py-2" style="width: 15rem; height: 18rem">
                  <div class="card-body d-flex flex-column align-items-center">
                    <img class="mb-2" src="{{ asset('/assets/img/icons/services/surgery.png') }}" alt="">
                    <p style="color: var(--primary-color);font-family: 'Libre Baskerville', serif; font-size: 18px;">Surgery</p>
                    <p class="text-center">We're here to help through surgery. Our doctors are ready to diagnose and treat your conditions.</p>
                  </div>
                </div>
          </div>
          <div class="container my-5 py-5 ">
          </div>
        </div>
      </section>
    <script src="{{ url('/assets/vendor/libs/jquery/jquery.js') }}"></script>
    <script src="{{ url('/assets/vendor/libs/popper/popper.js') }}"></script>
    <script src="{{ url('/assets/vendor/js/bootstrap.js') }}"></script>
</body>

</html>
