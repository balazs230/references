<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ asset('storage/imagini/icon.png')}}" type="image/x-icon">
        <title>Bookstore</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <style type="text/css">
            .admin {
                display: inline-block;
                width: 70px;
                height: 70px;
                position: fixed;
                top: 50px;
                right: 10px;
                padding: 20px !important;
                z-index: 99;
            }

            .admin i {
                font-size: 30px;
                color: #ffffff;
            }
        </style>
    </head>

    <body>
        <div class="container-xl">

            <!-- link catre site -->
            <a href="/" class="rounded-circle shadow p-4 mb-4 bg-primary admin">
                <i class="fas fa-globe"></i>
            </a>

            <!-- start navbar -->
            <nav class="navbar navbar-expand-md bg-primary navbar-dark">

                <a class="navbar-brand" href="">
                    <img src="{{ asset('storage/imagini/icon.png') }}" style="height:50px;">
                </a>

                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="collapsibleNavbar">
                    <ul class="navbar-nav mr-auto">
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('dashboard') }}"> Dashboard </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('books.index') }}"> Carti </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('categories.index') }}"> Categorii </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('users') }}"> Utilizatori </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('orders.index') }}"> Comenzi </a>
                        </li>
                        <li class="nav-item active">
                            <a class="nav-link" href="{{ route('reviews.index') }}"> Review-uri </a>
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
                        @endauth
                        
                        <li class="nav-item active">
                            <a href="{{ route('logout') }}" class="nav-link" onclick="event.preventDefault(); document.getElementById('logout-user').submit();">Logout</a>
                            <form action="{{ route('logout') }}" method="POST" id="logout-user">
                            @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
            <!-- end navbar -->

            <br /><br />

            
                <!-- start main content -->
                @yield('content')

            
            
        </div>



    </body>

</html>