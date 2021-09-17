<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ asset('storage/imagini/icon.png') }}" type="image/x-icon">
        <title>Bookstore</title>

        <link rel="stylesheet" href="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css') }}">
        <script src="{{ asset('https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js') }}"></script>
        <script src="{{ asset('https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js') }}"></script>
        <script src="{{ asset('https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js') }}"></script>
        <link rel="stylesheet" href="{{ asset('https://use.fontawesome.com/releases/v5.7.0/css/all.css') }}" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <style type="text/css">
            .footer-list li {
                margin-bottom: 15px;
            }

            .footer-list li a {
                color: #ffffff;
                font-family: -apple-system,BlinkMacSystemFont,"Segoe UI",Roboto,"Helvetica Neue",Arial,"Noto Sans",sans-serif,"Apple Color Emoji","Segoe UI Emoji","Segoe UI Symbol","Noto Color Emoji";
            }

            .carousel-item {
                height: 400px;
            }

            .carousel-item img {
                width: 100%;
                object-fit: cover;
            }

            .admin {
                display: inline-block;
                width: 70px;
                height: 70px;
                position: fixed;
                top: 50px;
                right: 10px;
                padding: 20px !important;
            }

            .admin i {
                font-size: 30px;
                color: #ffffff;
            }
        </style>
    </head>

    <body>
        <div class="container">

            <!-- link catre administrare -->
            @auth
               <a href="{{ route('dashboard') }}" title="ONLY FOR ADMINS!" class="rounded-circle shadow p-4 mb-4 bg-warning admin">
                <i class="fas fa-cog"></i>
            </a> 
            @endauth
            

            <!-- start navbar -->
            <nav class="navbar navbar-expand-md bg-primary navbar-dark">

                <a class="navbar-brand" href="{{ route('index') }}">
                    <img src="{{ asset('storage/imagini/icon.png') }}" style="height:50px;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('index') }}"> Carti </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href=""> Reduceri </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href=""> Despre Noi </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href=""> Contact </a>
                        </li>
                    </ul>
                    <ul class="navbar-nav my-2 my-lg-0">
                        @auth
                            <li class="nav-item active">
                                <p class="nav-link" style="color: yellow">Hello, <strong>{{ Auth::user()->name }}</strong>!</p>
                            </li>
                            <li class="nav-item active">
                                <p class="nav-link" style="color: red">{{ Auth::user()->role }}</p>
                            </li>
                            <li class="nav-item active">
                                <a class="nav-link" href="{{ route('cart') }}">Cos</a>
                            </li>
                        <li class="nav-item active">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-user').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-user">
                            @csrf
                            </form>
                        </li>
                        @endauth
                        
                        @guest
                           <li class="nav-item active">
                            <a class="nav-link" href="{{ route('login') }}">Autentificare</a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('register') }}">Înscriere</a>
                        </li> 
                        @endguest
                        
                    </ul>
                </div>
            </nav>
            <!-- end navbar -->

            <br>

            <!-- start carousel -->
            <div class="row">
                <div class="col-lg-12">
                    <div id="demo" class="carousel slide" data-ride="carousel">

                        <ul class="carousel-indicators">
                            <li data-target="#demo" data-slide-to="0" class="active"></li>
                            <li data-target="#demo" data-slide-to="1"></li>
                            <li data-target="#demo" data-slide-to="2"></li>
                        </ul>

                        <div class="carousel-inner">
                            <div class="carousel-item active">
                                <img src="{{ asset('storage/imagini/img-carousel-1.jpg') }}" alt="Psihologia Persuasiunii">
                                <div class="carousel-caption">
                                    <h3>Psihologia Persuasiunii</h3>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/imagini/img-carousel-2.png') }}" alt="Arta conversatiei">
                                <div class="carousel-caption">
                                    <h3>Arta conversatiei</h3>
                                </div>
                            </div>
                            <div class="carousel-item">
                                <img src="{{ asset('storage/imagini/img-carousel-3.jpg') }}" alt="Despre frumusetea uitata a vietii">
                                <div class="carousel-caption">
                                    <h3>Despre frumusetea uitata a vietii</h3>
                                </div>
                            </div>
                        </div>

                        <a class="carousel-control-prev" href="#demo" data-slide="prev">
                            <span class="carousel-control-prev-icon"></span>
                        </a>
                        <a class="carousel-control-next" href="#demo" data-slide="next">
                            <span class="carousel-control-next-icon"></span>
                        </a>

                    </div>
                </div>
            </div>
            <!-- end carousel -->

            <br /><br />

            <!-- start main content -->
            <div class="row">

                @yield('content')

            </div>

            <br /><br />

            <!-- start footer -->
            <div style="background-color: #333333;">
                <div class="row" style="margin: 0px !important;">
                    <div class="col-md-4" style="padding: 40px 30px 25px;">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Beletristica</a></li>
                            <li><a href="#">Carti pentru copii</a></li>
                            <li><a href="#">Timp liber</a></li>
                            <li><a href="#">Stiinte exacte</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4" style="padding: 40px 30px 25px;">
                        <ul class="list-unstyled footer-list">
                            <li><a href="#">Carti</a></li>
                            <li><a href="#">Reduceri</a></li>
                            <li><a href="#">Despre Noi</a></li>
                            <li><a href="#">Contact</a></li>
                        </ul>
                    </div>
                    <div class="col-md-4" style="padding: 40px 30px 25px;">
                        <ul class="list-unstyled footer-list">
                            <li><a href="">Regulament</a></li>
                            <li><a href="">Cookies</a></li>
                            <li><a href="">FAQ</a></li>
                            <li><a href="">Our Shops</a></li>
                        </ul>
                    </div>
                </div>
                <hr style="background: #999999; width: 75%; margin: auto;" />
                <br />
                <p class="font-italic text-center" style="color: #f2f2f2; padding-bottom: 15px !important;">© Copyright 2021. TechAdviser Academy Brașov, all rights reserved.</p>
            </div>
            <!-- end footer -->

        </div>
    </body>

</html>