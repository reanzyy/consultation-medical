<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <link rel="icon" type="image/x-icon" href="{{ asset('/assets/img/favicon/favicon.ico') }}" />
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/core.css') }}" class="template-customizer-core-css" />
    <link rel="stylesheet" href="{{ url('/assets/vendor/css/theme-default.css') }}" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="{{ url('/assets/css/demo.css') }}" />
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

        .description {
            margin-left: 10px;
            margin-top: -15px;
            
    color: var(--primary-color);
}


        .btn-register {
            color: var(--primary-color);
            padding: 5px 10px;
            text-decoration: none;
            border: 1px solid var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
        }

        .btn-login {
            color: white;
            padding: 5px 15px;
            text-decoration: none;
            background-color: var(--primary-color);
            font-weight: 500;
            border-radius: 20px;
        }

        .btn-login:hover {
            color: white;
        }

        .btn-register:hover {
            background-color: var(--primary-color);
            transition: 0.3s ease-in-out;
            color: white;
        }

        .btn-start {
            color: white;
            margin-top: 1000000rem;
            padding: 10px 20px;
            text-decoration: none;
            background-color: var(--secondary-color);
            font-weight: 500;
            border-radius: 20px;
        }

        .nama-dokter {
            font-family: Poppins;
            font-size: 18px;
            font-weight: 600;
            margin-bottom: 5px;
            margin-right: auto;
            width: 139px;
            height: 26px;
        }

        .form-control {
            border-radius: 10px;
        }

        .input-group {
            border: 1px solid var(--primary-color);
            border-radius: 10px;
        }

        .card {
            display: flex;
            flex-direction: column;
            align-items: center;
            border-radius: 10px;
            box-shadow: 0px 4px 4px 0px rgba(0, 0, 0, 0.25);
            width: 358px;
            height: 214px;
            margin-bottom: 20px;
        }
        .card-body{
            margin: -10px;
        }

        .btn-consul{
            
            display: flex;
            height: 30;
            width: 179px;
            padding: 5px 35px 5px 35px;
            justify-content: center;
            align-items:center;
            border-radius: 3px;
background: rgba(255, 228, 94, 0.58);
border: none;
color: #234874;
text-align: center;
font-family: Poppins;
font-size: 14px;
font-style: normal;
font-weight: 600;
line-height: normal;
        }
        .footer{
            color: white;
            background-color: var(--primary-color);  
        }
        .sub-footer {
            font-family: var(--font-libre);
            color: white;
        }

         .card-doctor {
            background: linear-gradient(to right, #D8EEFF, #FDFCE0);
        }

        .bio-dokter {
            font-family: Poppins;
            font-size: 14px;
            font-weight: 400;
            margin-bottom: 5px;
        }
        .dot {
        position: absolute;
        color: #FFE45E;
        width: 10px;
        height: 10px;
        border-radius: 50%;
        top: -5px; /* Adjust the top position as needed */
        right: -5px; /* Adjust the right position as needed */
    }
    .foto-doctor{
        width: 100%; 
        height: 100%; 
        object-fit: cover;
    }

        .bidang-dokter {
            font-family: Poppins;
            font-size: 14px;
            font-weight: 300;
            margin-bottom: 5px;
        }
        .rating-dokter{
            color: #234874;
font-family: Poppins;
font-size: 14px;
font-style: normal;
font-weight: 600;
line-height: normal;
        }
        .dot {
        position: absolute;
        background-color: yellow;
        width: 12px;
        height: 12px;
        border-radius: 50%;
        top: 15px; /* Adjust the top position as needed */
        left: 15px; /* Adjust the left position as needed */
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
        </div>
    </nav>
    <!-- End Navbar -->
    <section id="hero" class="mt-3">
     

         
        <div class="container-fluid px-5">
            <div class="row">
                <div class="col-md-6">
                    <p style="color: var(--primary-color); font-family: 'Libre Baskerville', serif; font-weight: 700; font-size: 30px; height: 28px;">
                        Make Assignment with our doctor</p>
                </div>
                <div class="col-md-6">
                    <div class="input-group">
                        <input type="text" class="form-control" placeholder="Search...">
                        <div class="input-group-append">
                            <button class="btn btn-transparent text-primary" type="submit">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>
            <div class="row">
                @foreach ($doctors as $doctor)
                <div class="col-md-4 mt-4">
                    <div class="card">
                        <div class="card-body">
                            <div class="d-flex justify-content-center align-items-center mb-2">
                                <div class=" card-doctor mb-2">
                                <img src="{{ asset('/assets/img/icons/services/usman.png') }}" alt="" class="foto-doctor">
                                <div class="dot"></div>
                                </div>
                                <div class="description " style="color: var(--primary-color);">
                                    <p class="nama-dokter">{{ $doctor->name }}</p>
                                    <p class="bidang-dokter">{{ $doctor->specialist->name }}</p>
                                    <p class="bio-dokter">
                                        <i class="fa-solid fa-clock"></i>
                                        {{ \Carbon\Carbon::parse($doctor->start_time)->format('H:i') }} - 
                                        {{ \Carbon\Carbon::parse($doctor->end_time)->format('H:i') }}
                                    </p>                                    
                                    <div class="rating-dokter">
                                        <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16"
                                            viewBox="0 0 16 16" fill="none">
                                            <path 
                                                d="M4.03402 14.459L5.0641 10.0059L5.07767 9.94721L5.03218 9.90778L1.57735 6.91253L6.14199 6.51629L6.202 6.51108L6.22545 6.4556L8.00001 2.25687L9.77456 6.4556L9.79802 6.51108L9.85803 6.51629L14.4227 6.91253L10.9678 9.90778L10.9223 9.94721L10.9359 10.0059L11.966 14.459L8.05166 12.0977L8.00001 12.0665L7.94836 12.0977L4.03402 14.459Z"
                                                fill="#FFE45E" stroke="#FF6392" stroke-width="0.2" />
                                        </svg>
                                        5.0
                                    </div>
                                    <div class=" btn-consul mt-4 ">Busy

                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                @endforeach
            </div>
        
        </div>
        <div class="custom-padding mt-4">
       <p class="mb-4 mt-4 mb-y" style="color: var(--primary-color);font-family: 'Libre Baskerville', serif;">
           How to contact a doctor online <br>
           Consulting with a SemestaCare doctor online can be done quickly. With just three easy steps, you can connect with the doctor you need. <br>
           There are specialist doctors in neurology, dentistry, and surgery available for you to contact 24 hours a day. <br>
           1.First step: Choose from the available best doctors and send a request to discuss your health needs or concerns. <br>
           2.Second step: Wait for the doctor. The doctor will approve your request (usually within one minute). <br>
           3.Final step: Talk to the doctor. Once you've connected with the doctor, please explain your condition calmly and clearly by asking the SemestaCare doctor. <br>
           No need to worry, all conversations and health diagnoses with the SemestaCare doctor will be kept secure. Even though it's done online, rest assured that your complaints and health discussions during the chat with the doctor at SemestaCare will remain confidential.
       </p>
       </div>
    </section>
    <section id="footer">
        <div class="container-fluid d-flex flex-column align-items-center footer pt-5">
            <h2 class="text-center sub-footer">
                <span>
                    <img src="{{ asset('/assets/img/icons/footer/footer-logo.png') }}" class="mx-2" width="50">
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