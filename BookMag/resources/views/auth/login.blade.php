<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ asset('storage/imagini/icon.png')}}" type="image/x-icon">
        <title>Login</title>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js"></script>
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.0/css/all.css" integrity="sha384-lZN37f5QGtY3VHgisS14W3ExzMWZxybE1SJSEsQp9S+oqd12jhcu+A56Ebc1zFSJ" crossorigin="anonymous">

        <style type="text/css">
            img {
                object-fit: cover;
                height: 200px;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">

                    <h3>Autentificare</h3>
                    <hr>
                    <br>

                    @if ($errors->any())
                        <div class="alert alert-danger alert-dismissible">
                            <button type="button" class="close" data-dismiss="alert">&times;</button>
                            @foreach ($errors->all() as $error)
                                {{ $error }}
                            @endforeach   
                        </div>
                    @endif
                    <br>

                    <form action="{{ route('login') }}" method="POST">
                        @csrf
                        
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control" placeholder="Enter email" name="email">
                            
                        </div>
                        <div class="form-group">
                            <label>Parolă:</label>
                            <input type="password" class="form-control" placeholder="Enter password" name="password">
                            
                        </div>
                        <button type="submit" class="btn btn-primary">Autentificare</button>
                        <a href="{{ route('register') }}" type="button" class="btn btn-primary">Register</a>
                    </form>

                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>

    </body>

</html>