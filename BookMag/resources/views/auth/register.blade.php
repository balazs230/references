<html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <link rel="icon" href="{{ asset('storage/imagini/icon.png')}}" type="image/x-icon">
        <title>Înscriere</title>

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

            .errors {
                color: red;
                font-size: 14px;
            }
        </style>
    </head>

    <body>

        <div class="container">
            <div class="row" style="margin-top:30px;">
                <div class="col-lg-2"></div>
                <div class="col-lg-8">

                    <h3>Înscriere</h3>
                    <hr>
                    <br>


                    <form method="POST" action="{{ route('register') }}">
                        @csrf
            
                        <!-- Name -->
                        <div class="form-group">
                            <label>Nume:</label>
                            <input type="text" class="form-control @error('name') is-invalid @enderror" placeholder="Adaugă numele complet" name="name">
                            @error('name')
                                <small class="form-text" style="color: red;">{{ $message  }}</small>  
                            @enderror
                        </div>
            
                        <!-- Email Address -->
                        <div class="form-group">
                            <label>Email:</label>
                            <input type="email" class="form-control @error('email') is-invalid @enderror" placeholder="Adaugă numele complet" name="email">
                            @error('email')
                                <small class="form-text" style="color: red;">{{ $message  }}</small>  
                            @enderror
                        </div>

                        <!-- Telefon -->
                        <div class="form-group">
                            <label>Telefon:</label>
                            <input type="number" class="form-control @error('phone') is-invalid @enderror" placeholder="Adaugă numarul de telefon" name="phone">
                            @error('phone')
                                <small class="form-text" style="color: red;">{{ $message  }}</small>  
                            @enderror
                        </div>

                        <!-- Adresa -->
                        <div class="form-group">
                            <label>Adresa:</label>
                            <textarea class="form-control @error('address') is-invalid @enderror" placeholder="Adaugă adresa" rows="4" name="address"></textarea>
                            @error('address')
                                <small class="form-text" style="color: red;">{{ $message  }}</small>  
                            @enderror
                        </div>
            
                        <!-- Password -->
                        <div class="form-group">
                            <label>Parolă:</label>
                            <input type="password" class="form-control @error('password') is-invalid @enderror" placeholder="Adaugă parola" name="password">
                            @error('password')
                                <small class="form-text" style="color: red;">{{ $message  }}</small>  
                            @enderror
                        </div>
            
                        <!-- Confirm Password -->

                        <div class="form-group">
                            <label>Repetă parola:</label>
                            <input type="password" class="form-control @error('password_confirmation') is-invalid @enderror" placeholder="Repetă parola" name="password_confirmation">
                            @error('password_confirmation')
                                <small class="form-text" style="color: red;">{{ $message  }}</small>  
                            @enderror
                        </div>
                        <button type="submit" class="btn btn-primary">Înscriere</button>
            
                        
                    </form> 

                </div>
                <div class="col-lg-2"></div>
            </div>
        </div>

    </body>

</html>


